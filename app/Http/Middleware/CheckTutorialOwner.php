<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Models\Tutorial;
use Illuminate\Support\Facades\Auth;

class CheckTutorialOwner
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
        $tutorial = $request->route('tutorial');

        if($tutorial->user_id != Auth::user()->id) {
            return redirect()->route('tutoriais.show', $tutorial->id)->with('warning', 'Não Autorizado! Você nao é proprietario desse tutorial');
        }
        
        return $next($request);
    }
}
