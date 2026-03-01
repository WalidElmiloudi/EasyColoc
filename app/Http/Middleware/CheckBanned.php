<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status === 'banned') {
            if (!in_array($request->route()->getName(), ['login', 'register'])) {
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors('Your account is banned. You can only login or register.');
            }
        }

        return $next($request);
    }
}