<?php

namespace App\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleDevMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = 'admin')
    {
        if (auth()->guard($guard)->user()->role == 'dev') {

            return $next($request);
        }
        Log::critical('Admin ID: '.auth()->guard($guard)->user()->id.' Đã cố gắng truy cập vào đường dẫn không được phép #'.$request->path());
        return abort(403);
        
    }
}