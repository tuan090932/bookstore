<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginValidationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            print("ham fail da run");
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return $next($request);
    }
}
