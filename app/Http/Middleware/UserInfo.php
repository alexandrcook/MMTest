<?php

namespace App\Http\Middleware;

use Closure;
use App\Session;
use App\Helpers\Helper as Helper;

class UserInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $sessionId = $request->session()->getId();
        $session = Session::where('session_identifier', $sessionId)->first();

        if(!$session){
            $userAgent = $request->userAgent();
            $browserIs = Helper::getBrowserInfo($userAgent);

            $session = new Session();
            $session->session_identifier = $sessionId;
            $session->ip = $request->ip();
            $session->user = $request->server('USER');
            $session->browser = $browserIs;

            $session->save();

        }

        return $response;
    }
}
