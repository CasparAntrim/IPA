<?php

namespace App\Http\Middleware;

use Closure;

class CheckAssociation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // $requestCompId = request()->get('id');
        // if(! auth()->check && ! auth()->user()->company->id

        $authCompId = auth()->user()->company->id;
        // dd($authCompId);
        $requestedCompId = $request->route('req_user')->company_id;
        // dd($requestedCompId);

        if($authCompId !== $requestedCompId) {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
