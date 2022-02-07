<?php namespace App\Services;

abstract class AbstractService
{
    protected $db;
    protected $container;
    public $model;

    public function __construct($container)
    {
        $this->container = $container;
        $this->db = $container->get('db');
    }

    public function get()
    {
        return $this->model::all();
    }

    public function find($id)
    {
        return $this->model::find($id);
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function save($entity, $data)
    {
        if(!$entity) $entity = new $this->model;

        $entity->fill($data);
        $entity->save();
        return $entity;
    }

    public function validate($request) {
        $validation = $this->container->validator->validate($request, $this->model::$validations);

        if($validation->failed()) {
            return false;
        }

        return $request->getParsedBody();
    }
}
