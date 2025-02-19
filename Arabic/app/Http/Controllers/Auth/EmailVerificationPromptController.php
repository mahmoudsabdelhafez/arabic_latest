<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    // In EmailVerificationPromptController
public function __invoke(Request $request)
{
    return view('auth.verify-email'); // Make sure you have the correct view for email verification
}

}
