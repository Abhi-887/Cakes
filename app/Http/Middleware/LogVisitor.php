<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LogVisitor
{
    public function handle($request, Closure $next)
    {
        // Get the visitor cookie or generate a new one
        $visitorCookie = $request->cookie('visitor_id') ?? (string) Str::uuid();

        // Check if the visitor has been logged today
        $visitor = Visitor::where('visitor_id', $visitorCookie)
            ->whereDate('created_at', today())
            ->first();

        if (!$visitor) {
            // If the visitor record doesn't exist, create a new one with session start time
            $visitor = Visitor::create([
                'ip_address' => $request->ip(),
                'visitor_id' => $visitorCookie,
                'session_start' => Carbon::now(),
                'page_views' => 1, // Start with the first page view
            ]);
        } else {
            // If the visitor record exists, update the page views and session end time
            $visitor->increment('page_views');
            $visitor->update(['session_end' => Carbon::now()]);
        }

        // Set the visitor cookie in the response
        $response = $next($request);

        return $response->cookie('visitor_id', $visitorCookie, 60 * 24 * 365); // 1 year
    }
}
