<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Users;

class redirectInstall
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
      if($res < 1) {
        return redirect()->route('g_step');
      }
      return $next($request);
    } catch (QueryException $e) {
      return redirect()->route('g_step');
    }
  }
}
