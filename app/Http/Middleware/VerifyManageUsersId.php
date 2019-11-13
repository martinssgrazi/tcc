<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class VerifyManageUsersId
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
        
        //Checa se um usuario esta tentando alterar a si mesmo
        if($user->id == Auth::user()->id) {
            $message = 'Você não está permitido a ';
            $message = $routeName == 'admin.users.destroy' ? $message.'deletar isto.' : $message.'editar isto.';

            return redirect()->route('admin.users.index')->with('warning', $message);
        }
        
        return $next($request);
    }
}
