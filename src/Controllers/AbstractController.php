<?php namespace App\Controllers;

use App\Utils\Helper;

abstract class AbstractController
{
    private $container;	
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function __get($property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }

    protected function makeResponse($request, $jsonReponseHandler, $htmlReponseHandler) {
        if($request->isXhr()) {
            return $jsonReponseHandler();
        }

        return $htmlReponseHandler();
    }

    protected function sendJsonResponse($res, $data, $status = 200) {
        if(!$data) return $res->withStatus(404);
        return $res->withJson($data, $status);
    }

    public function validate($request, $rules) {
        $validation = $this->container->validator->validate($request, $rules);

        if($validation->failed()) {
            return false;
        }

        return $request->getParsedBody();
    }
}
