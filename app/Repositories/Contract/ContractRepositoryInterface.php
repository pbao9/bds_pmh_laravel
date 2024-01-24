<?php

namespace App\Repositories\Contract;

interface ContractRepositoryInterface
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
    public function restore($id);
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
     * Delete a record
     *
     * @param int $id Model id
     * @return object model instance
     * @throws \Exception
     * @return boolean true false
     */
    public function forceDelete($id);
    /**
     * Return all records
     * @param string $field
     * @param string $value
     * @param string $compare
     * @return mixed
     */
    public function forceDeleteBy($field, $value, $compare = '=');
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
    /**
     * make query
     * 
     * @param string $action
     * 
     * @return boolean
     */
    public function authorize($action);
}
