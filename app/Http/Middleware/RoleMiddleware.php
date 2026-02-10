<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // ❌ belum login
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        $user = Auth::user();

        // ❌ role kosong
        if (!$user->role) {
            abort(403, 'Role not assigned');
        }

        // ✅ support banyak role: role:admin,user
        if (!in_array($user->role, $roles)) {
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
