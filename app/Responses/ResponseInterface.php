<?php
namespace App\Responses;

interface ResponseInterface
{
    /**
     * @param string $view | path to view file
     * @param array $data | array of data to sending the response to view
     **/
    public function view($view, $data = []);
    /**
     * @param string $routeName | defind name in web route
     * @param int|string $id | id of all record on any table database
     * @return view | path to view file
     **/
    public function routeId($routeName, $id, $msgSuccess = null, $msgError = null);
    /**
     * @param string $view | path to view file
     * @param array $data | array of data to sending the response to view
     * @param array $required | array required key value in $data | array_key_exists 
     * @return redirect| path to view files
     **/
    public function viewRequired($view, $data, $required = [], $msgSuccess = null, $msgError = null);
    /**
     * @param string|boolean|integer|array|object $check
     * @param string $msg | message
     * @return redirect| redirect back
     **/
    public function backCheckBoolean($check, $msgSuccess = null, $msgError = null);
    /**
     * @param string|boolean|integer|array|object $check
     * @param string $msg | message
     * @return redirect| redirect route name
     **/
    public function redirectCheckBoolean($check, $routeName, $msgSuccess = null, $msgError = null);
    /**
     * @param string $routeName | defind name in web route
     * @param integer|array $params 
     * @param string $msg | message
     * @return redirect| redirect route name has msg success
     **/
    public function redirectRouteHasMsg($routeName, $params = null, $msg = null);
    /**
     * @param string $routeName | defind name in web route
     * @param integer|array $params 
     * @return redirect| redirect route name
     **/
    public function redirectRoute($routeName, $params = null);
    /**
     * @param string|boolean|integer|array|object $check
     * @return object
     **/
    public function ajaxSimple($check);
    /**
     * @param string|boolean|integer|array|object $check
     * @param array $data
     * @return json
     **/
    public function ajaxJson($check, $data);
    /**
     * @param string|boolean|integer|array|object $data
     * @return boolean
     **/
    public function checkBoolean($data);
    /**
     * @param array $data | array of data to sending the response to view
     * @param array $required | array required key value in $data | array_key_exists 
     * @return boolean
     **/
    public function checkRequiredData($data, $required = []);

}