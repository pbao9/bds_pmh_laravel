<?php

namespace App\Responses;

use App\Responses\ResponseInterface;

class Response implements ResponseInterface
{

    protected $msgSuccess;
    
    protected $msgError;

    protected $instance;

    public function __construct(){
        $this->msgSuccess = __('Thực hiện thành công');
        $this->msgError = __('Thực hiện không thành công');
    }

    public function view($view, $data = []){

        return view($view, $data);

    }

    public function routeId($routeName, $id, $msgSuccess = null, $msgError = null){

        if($id){
            return $this->redirectRouteHasMsg($routeName, $id);
        }

        return $this->backCheckBoolean(false, null, $this->msgError);

    }

    public function viewRequired($view, $data, $required = [], $msgSuccess = null, $msgError = 'Không tìm thấy bản ghi này.'){
        
        if($this->checkRequiredData($data, $required)){

            return $this->view($view, $data);

        }
        return $this->backCheckBoolean(false, null, __($msgError) ?? $this->msgError);       
    }

    public function backCheckBoolean($check, $msgSuccess = null, $msgError = null){

        if($this->checkBoolean($check)){
            return back()->with('success', $msgSuccess ?? $this->msgSuccess);
        }
        return back()->with('error', $msgError ?? $this->msgError);

    }

    public function redirectCheckBoolean($check, $routeName, $msgSuccess = null, $msgError = null) {

        if($this->checkBoolean($check)){
            return $this->redirectRouteHasMsg($routeName);
        }
        
        return back()->with('error', $msgError ?? $this->msgError);
        
    }

    public function redirectRouteHasMsg($routeName, $params = null, $msg = null) {
        return $this->redirectRoute($routeName, $params)->with('success', $msg ?? $this->msgSuccess);
    }

    public function redirectRoute($routeName, $params = null) {
        return $params ? redirect()->route($routeName, $params) : redirect()->route($routeName);
    }
    
    public function ajaxSimple($check){

        if($this->checkBoolean($check)){
            return response()->json([
                'status' => 200,
                'message' => $this->msgSuccess
            ], 200);
        }

        return response()->json([
            'status' => 400,
            'message' => $this->msgError
        ], 400);

    }
    public function ajaxJson($check, $data){

        if($this->checkBoolean($check)){
            return response()->json([
                'status' => 200,
                'message' => $this->msgSuccess,
                'data' => json_encode($data)
            ], 200);
        }

        return response()->json([
            'status' => 400,
            'message' => $this->msgError,
        ], 400);

    }

    public function checkBoolean($data){
        
        $type = gettype($data);

        if($type == 'array') {
            return count($data) == 0 ? false : true;
        }elseif($type == 'object'){
            return $data ? true : false;
        }elseif($type == 'string') {
            return strlen($data) == 0 ? false : true;
        }elseif($type == 'boolean') {
            return $data;
        }elseif($type == 'integer') {
            return true;
        }
        return false;
    }

    public function checkRequiredData($data, $required = []){
        $flag = true;
        foreach($required as $value) {
            if(!$data[$value]){
                $flag = false;
                break;
            }
        }
        return $flag;
    }

}