<?php

namespace App\Repositories\District;

interface DistrictRepositoryInterface
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
}