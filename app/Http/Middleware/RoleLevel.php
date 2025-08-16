<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$roleLevel)
    {
        if (!auth()->check() || !isset(auth()->user()->customer) )  {
            Auth::logout();
            return redirect('login')->withErrors("Bạn không đủ quyền truy cập!");
        }
        if( (auth()->user()->customer->status !== 'active') ) {
            Auth::logout();
            return redirect('login')->withErrors("Tài khoản đã bị vô hiệu!");
        }
        
        $userRoleLevel = auth()->user()->customer->customerRoles->first()->lever;
        $roleLevelCheck = Role::where('lever_key',trim($roleLevel))->first()->lever;
        
        if(!empty($userRoleLevel) && !empty($roleLevelCheck) && ($userRoleLevel <= $roleLevelCheck)) {
            return $next($request);
        }
    
        return redirect('/')->withErrors("Bạn không đủ quyền truy cập!");
    }
}
