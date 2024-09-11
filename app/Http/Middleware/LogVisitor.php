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

        // Check if there is an existing visitor record for today
        $visitor = Visitor::where('visitor_id', $visitorCookie)
            ->whereDate('created_at', today())
            ->first();

        // If no visitor record exists, or if the session has ended, create a new session
        if (!$visitor || $visitor->session_end) {
            $visitor = Visitor::create([
                'ip_address' => $request->ip(),
                'visitor_id' => $visitorCookie,
                'session_start' => Carbon::now(),
                'page_views' => 1, // Start with the first page view
            ]);
        } else {
            // If the session is still ongoing, increment the page views and update the session end time
            $visitor->increment('page_views');
            $visitor->update(['session_end' => Carbon::now()]);
        }

        // Set the visitor cookie in the response
        $response = $next($request);

        return $response->cookie('visitor_id', $visitorCookie, 60 * 24 * 365); // 1 year
    }
}
