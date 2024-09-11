<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Support\Str;

class LogVisitor
{
    public function handle($request, Closure $next)
    {
        // Get the visitor cookie or generate a new one
        $visitorCookie = $request->cookie('visitor_id') ?? (string) Str::uuid();

        // Check if the visitor has been logged today
        $visitorExists = Visitor::where('visitor_id', $visitorCookie)
            ->whereDate('created_at', today())
            ->exists();

        if (!$visitorExists) {
            Visitor::create([
                'ip_address' => $request->ip(),
                'visitor_id' => $visitorCookie,
            ]);
        }

        // Set the visitor cookie in the response
        $response = $next($request);
        return $response->cookie('visitor_id', $visitorCookie, 60 * 24 * 365); // 1 year
    }
}
