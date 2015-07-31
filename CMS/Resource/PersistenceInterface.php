<?php namespace CMS\Resource;

interface PersistenceInterface
{

    public function setModulePrefix($modulePrefix);

    public function setResource($resource);

    public function create();

    public function store($id = NULL);

    public function get($id);

    public function update($id);

    /*
     * @param $order Query order
     * @param $conditions Query conditions
     */
    public function getAll($order, $conditions, $json);

    public function destroy($id);

    public function postImages();

    public function getImages();

    public function deleteImage($id);

    public function sort();
}
