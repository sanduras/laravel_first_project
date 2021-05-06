<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Http\Requests\VerifyEmailRequest;

class VerifyEmailsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(VerifyEmailRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // dd(1);
            return redirect()->intended(route('dashboard',[app()->getLocale()]).'?verified=1');
         }
 
         if ($request->user()->markEmailAsVerified()) {
             //dd(2);
             event(new Verified($request->user()));
            
         }
     //dd(3);
         return redirect()->intended(route('dashboard',[app()->getLocale()]).'?verified=1');
     }
    
}


