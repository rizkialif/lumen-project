<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE',
            'Access-Control-Allow-Max-Age' => '86400',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Requested-With'
        ];

        $response = $next($request);
        foreach ($headers as $key => $value){
            $response->header($key, $value);
        }
        return $response;
    }
}
