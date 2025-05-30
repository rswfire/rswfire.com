<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class VerifyFieldAccessKey
{

    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->input('access_code');

        if ($key !== config('field.access_key')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return $next($request);
    }

}
