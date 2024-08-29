<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\CurrentUser;

class EmployeeIconFile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $company_id = 0;
        if(Auth::check()) {
            $currentCompany = CurrentUser::currentCompany();
            $company_id = $currentCompany->id;
        }
        $requestedPath = $request->path();
        if (str_starts_with($requestedPath, 'storage/photo')) {
            $parts = explode('/', $requestedPath);
            if (isset($parts[2])) {
                $requestedCompanyId = $parts[2];
                if ($requestedCompanyId !== $company_id) {
                    abort(404);
                }
            }
        }
        return $next($request);
    }
}
