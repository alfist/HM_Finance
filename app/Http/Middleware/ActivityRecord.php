<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\ActivityLog;

class ActivityRecord
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
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'fitur' => $request->getPathInfo(),
            'method' => $request->getMethod(),
            'payload' => json_encode($request->all()),
        ]);
        return $next($request);
    }
}
