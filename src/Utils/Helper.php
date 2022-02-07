<?php namespace App\Utils;

final class Helper
{
    public static function transformFloatValues($obj, ...$fields)
    {
        foreach ($fields as $field) {
            if (property_exists($obj, $field)) {
                $obj->{$field} = floatval($obj->{$field});
            }
        }
    }

    public static function makeDate($str_date)
    {
        $substr_date = substr($str_date, 0, strpos($str_date, '('));

        if (empty($substr_date)) {
            return date('Y-m-d', strtotime($str_date));
        }

        return date('Y-m-d', strtotime($substr_date));
    }

    public static function isJson($request) {
        $contentType = self::determineContentType($request);
        if($contentType === 'application/json') return true;

        return false;
    }

    public static function determineContentType($request)
    {
        $knownContentTypes = [
            'application/json',
            'application/xml',
            'text/xml',
            'text/html',
        ];

        $acceptHeader = $request->getHeaderLine('Accept');
        $selectedContentTypes = array_intersect(explode(',', $acceptHeader), $knownContentTypes);

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
