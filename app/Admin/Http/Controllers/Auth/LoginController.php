<?php

namespace App\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use \Auth;
use App\Admin\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function getView(){
        return [
            'index' => 'admin.auth.login'
        ];
    }

    public function index(){
        return $this->response->view($this->view['index']);
    }

    public function login(LoginRequest $request){

        $this->data = $request->only('email', 'password');
        
        if($this->resolve()){

            $request->session()->regenerate();
            
            return redirect()->intended(route('admin.dashboard'))->with('success', __('Đăng nhập thành công'));

        }
        return $this->response->backCheckBoolean(false, null, __('Tên đăng nhập hoặc mật khẩu không đúng'));
    }

    protected function resolve(){

        return Auth::guard('admin')->attempt($this->data) ? true : false;

    }
}