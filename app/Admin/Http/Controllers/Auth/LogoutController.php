<?php

namespace App\Admin\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use \Auth;

class LogoutController extends BaseController
{
    //
    public function logout(Request $request){

        Auth::guard('admin')->logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return $this->response->redirectRouteHasMsg('admin.login', null, __('Bạn đã đăng xuất thành công'));
    }
    
}