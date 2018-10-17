<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Users;

class Install
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @param  string|null  $guard
   * @return mixed
   */
  public function handle($request, Closure $next, $guard = null)
  {
    $Instance = new Users();

    try {
      $res = $Instance->GetAll()->count();
      if($res != 0) {
        return redirect()->route('login');
      }
      return $next($request);
    } catch (QueryException $e) {
      return $next($request);
    }
  }
}
