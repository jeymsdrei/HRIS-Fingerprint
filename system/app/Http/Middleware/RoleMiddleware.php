<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        if (! $user->is_active) {
            auth()->logout();

            return redirect()->route('login')->withErrors(['username' => 'Your account has been deactivated.']);
        }

        // admin can access everything
        if ($user->role !== 'admin' && ! in_array($user->role, $roles, true)) {
            // Employees: redirect to their employee area instead of leaking admin URLs or data.
            if ($user->role === 'employee') {
                return redirect()->route('employee.attendance')->withErrors([
                    'access' => 'You do not have permission to access that page.',
                ]);
            }

            abort(403, 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
