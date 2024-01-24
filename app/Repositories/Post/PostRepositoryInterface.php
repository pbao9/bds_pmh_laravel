<?php

namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    /**
     * Return all records
     *
     * @return mixed
     */
    public function getAll();
    
	/**
     * Find a single record
     *
     * @param int $id
     * @param array $relations
     * @return mixed
     * 
     */
	public function find($id);
    /**
     * Find a single record
     *
     * @param int $id
     * @param array $relations
     * @return mixed
     * 
     */
    public function findWithRelations($id, $relations = []);
    /**
     * Create a new record
     *
     * @param array $data The input data
     * @return object model instance
     * 
     */
    public function create(array $data);
    /**
     * Create a new record has category
     *
     * @param array $data The input data
     * @param array $category The input category
     * @return object model instance
     * 
     */
    public function createHasCategory(array $data, array $category);

    /**
     * Update the model instance
     *
     * @param int $id The model id
     * @param array $data The input data
     * @return boolean true false
     * 
     */
    public function update($id, array $data);
    /**
     * Update the model instance
     *
     * @param int $id The model id
     * @param array $data
     * @param array $category
     * @return mixed
     * 
     */
    public function updateHasCategory($id, array $data, array $category);
    /**
     * Delete a record
     *
     * @param int $id Model id
     * @return object model instance
     * @throws \Exception
     * @return boolean true false
     */
    public function delete($id);
    /**
     * Return all records
     * @param string $field
     * @param string $value
     * @param string $compare
     * @return mixed
     */
    public function deleteBy($field, $value, $compare = '=');

    /**
     * make query the model instance
     *
     * @var App\Model\Stall $stall
     * @var array $category
     *  
     * @return mixed 
     * 
     */
    public function syncCategory($post, $category);
    /**
     * make query the model instance
     *
     * @var App\Model\Admin $admin
     * @param array $relations The relations
     *  
     * @return \Illuminate\Database\Eloquent\Builder
     * 
     */
    public function getQueryBuilderSelectWithRelations(array $select = [], $relations = []);
    /**
     * make query
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQueryBuilder();
}