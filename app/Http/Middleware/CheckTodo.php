<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;
use Symfony\Component\HttpFoundation\Response;

class CheckTodo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $mot = "oui";
        if(str_contains($request->texte, $mot)) {
            return redirect()->back()->with('error', 'Le mot ' . $mot .' est interdit');
        }
        return $next($request);
    }
}
