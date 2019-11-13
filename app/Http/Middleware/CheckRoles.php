<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routeName = $request->route()->getName();
        $user = $request->route('user');
        $isAdmin = Auth::user()->hasAnyRole('admin');
        $adminRole = Role::where('nome', 'admin')->first();
        $message = null;

        if($routeName == 'admin.users.destroy' && !$isAdmin && $user->hasAnyRole('admin')) {
            $message = 'Você não tem privilegios de Administrador.';
        }

        if($routeName != 'admin.users.destroy') {
            if($request->has('roles')) {
                $hasAdminRole = in_array($adminRole->id, $request->roles);
                if(!$isAdmin && $user->hasAnyRole('admin') && !$hasAdminRole ) {
                    $message = 'Você não tem privilegios de Administrador.';
                }
                else if(!$isAdmin && !$user->hasAnyRole('admin') && $hasAdminRole) {
                    $message = 'Você não tem privilegios de Administrador.';
                }
            } 
            else {
                $message = 'O usuario '.$user->name.' deve ter ao menos uma Role.';
            }
        }

        if($message != null) {
            return redirect()->route('admin.users.index')->with('warning', $message);
        }

        return $next($request);
    }
}
