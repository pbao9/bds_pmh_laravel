<?php

namespace App\Repositories\HouseOwner;

interface HouseOwnerRepositoryInterface
{
    /**
     * Return all records
     *
     * @return mixed
     */
    public function getAll();
    /**
     * Return all records
     *
     * @param string $value
     * @param array $select
     * @param integer $limit
     * @return mixed
     */
    public function searchAllLimit($value = '', $select = [], $limit = 10);
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
     * Create a new record
     *
     * @param array $data The input data
     * @return object model instance
     * 
     */
    public function create(array $data);

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
     * Delete a record
     *
     * @param int $id Model id
     * @return object model instance
     * @throws \Exception
     * @return boolean true false
     */
    public function delete($id);
    /**
     * make query the model instance
     *
     * @param array $relations The relations
     *  
     * @return \Illuminate\Database\Eloquent\Builder
     * 
     */
    public function getQueryBuilderWithRelations(array $relations = []);
    /**
     * make query
     * 
     * @param array $select return field
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQueryBuilderSelect(array $select = []);
    /**
     * make query
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQueryBuilder();
    /**
     * make query
     * 
     * @param string $action
     * 
     * @return boolean
     */
    public function authorize($action);
}