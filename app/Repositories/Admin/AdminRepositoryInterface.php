<?php

namespace App\Repositories\Admin;

interface AdminRepositoryInterface
{
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
     * @return mixed
     * 
     */
    public function getCustomer($id);
	/**
     * Find a single record
     *
     * @param int $id
     * @return mixed
     * 
     */
	public function find($id);
    /**
     * Find a single record
     *
     * @var App\Models\Admin $admin
     * @return mixed
     * 
     */
    public function getLoginLog($admin);
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
     * @var App\Model\Admin $admin
     * @param array $relations The relations
     *  
     * @return \Illuminate\Database\Eloquent\Builder
     * 
     */
    public function getQueryBuilderMeetingWithRelations($admin, $relations = []);
    /**
     * make query the model instance
     *
     * @var App\Model\Admin $admin
     * @param array $relations The relations
     *  
     * @return \Illuminate\Database\Eloquent\Builder
     * 
     */
    public function getQueryBuilderLandWithRelations($admin, $relations = []);
    /**
     * make query the model instance
     *
     * @var App\Model\Admin $admin
     * @param array $relations The relations
     *  
     * @return \Illuminate\Database\Eloquent\Builder
     * 
     */
    public function getQueryBuilderLandWithRelationsOnlyTrash($admin, $relations = []);
    /**
     * make query the model instance
     *
     * @var App\Model\Admin $admin
     * @param array $relations The relations
     *  
     * @return \Illuminate\Database\Eloquent\Builder
     * 
     */
    public function getQueryBuilderCustomerWithRelations($admin, $relations = []);
    /**
     * make query the model instance
     *
     * @var App\Model\Admin $admin
     * @param array $relations The relations
     *  
     * @return \Illuminate\Database\Eloquent\Builder
     * 
     */
    public function getQueryBuilderHouseOwnerWithRelations($admin, $relations = []);
    /**
     * make query the model instance
     *
     * @var App\Model\Admin $admin
     * @var array $customer
     *  
     * @return mixed 
     * 
     */
    public function syncCustomer($admin, $customer);
    /**
     * make query the model instance
     *
     * @param array $select return
     * @return \Illuminate\Database\Eloquent\Builder
     * 
     */
    public function getQueryBuilderFilterRole(array $select = []);
    /**
     * make query
     * 
     * @return mixed
     */
    public function getQueryBuilder();
}