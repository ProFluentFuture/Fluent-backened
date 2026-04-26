<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTutorStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $user->role === 'tutor') {
            if ($user->status === 'pending') {
                return redirect()->route('tutor.pending');
            }
            if ($user->status === 'rejected') {
                auth()->logout();
                return redirect()->route('tutor.login')->withErrors(['email' => 'Your account has been blocked.']);
            }
        }

        return $next($request);
    }
}
