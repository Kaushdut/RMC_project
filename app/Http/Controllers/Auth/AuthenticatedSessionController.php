<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login form.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle login form submission.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate user
        $request->authenticate();
        $request->session()->regenerate();

        $user = auth()->user();
               Auth::user()->update([
        'last_login_at' => now(),
          ]);
        // Redirect based on role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
         elseif ($user->role === 'meteorologist') 
         {
            return redirect()->route('meteo.dashboard');
        }
        elseif($user->role === 'multistationuser'){
            return redirect()->route('multiuser.dashboard');
        }
         else 
        {
            return redirect()->route('observer.dashboard');
        }
    
    }

    /**
     * Handle logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
      Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
