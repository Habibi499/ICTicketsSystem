<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
            // Define allowed origins, methods, headers, etc.
            $allowedOrigins = ['http://example.com', 'https://example2.com','http://192.192.1.23'];
            $allowedMethods = ['GET', 'POST'];
            $allowedHeaders = ['X-Requested-With', 'Content-Type', 'Authorization'];
    
            // Check if the request origin is in the list of allowed origins
            $origin = $request->header('Origin');
            if (in_array($origin, $allowedOrigins)) {
                // Set CORS headers
                header("Access-Control-Allow-Origin: $origin");
                header("Access-Control-Allow-Methods: " . implode(', ', $allowedMethods));
                header("Access-Control-Allow-Headers: " . implode(', ', $allowedHeaders));
            }
    
            // Handle preflight requests
            if ($request->isMethod('OPTIONS')) {
                return response('', 204)
                    ->header('Access-Control-Allow-Origin', $origin)
                    ->header('Access-Control-Allow-Methods', implode(', ', $allowedMethods))
                    ->header('Access-Control-Allow-Headers', implode(', ', $allowedHeaders));
            }
    
            return $next($request);
        }
    
}
