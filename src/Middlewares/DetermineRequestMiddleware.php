<?php namespace App\Middlewares;

final class DetermineRequestMiddleware
{
    private $knownContentTypes = [
        'application/json',
        'application/xml',
        'text/xml',
        'text/html',
    ];

    public function __invoke($request, $response, $next)
    {
        $request = $request->withAttribute('is_json', $this->isJson($request));
        return $next($request, $response);
    }

    public function isJson($request) {
        $contentType = $this->determineContentType($request);
        if($contentType === 'application/json') return true;

        return false;
    }

    public function determineContentType($request)
    {
        $acceptHeader = $request->getHeaderLine('Accept');
        $selectedContentTypes = array_intersect(explode(',', $acceptHeader), $this->knownContentTypes);

        if (count($selectedContentTypes)) {
            return current($selectedContentTypes);
        }
        // handle +json and +xml specially
        if (preg_match('/\+(json|xml)/', $acceptHeader, $matches)) {
            $mediaType = 'application/' . $matches[1];
            if (in_array($mediaType, $this->knownContentTypes)) {
                return $mediaType;
            }
        }

        return 'text/html';
    }
}
