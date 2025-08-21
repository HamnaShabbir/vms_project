<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Logs;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $log = new Logs();
    //     $log->user_id = user()->id;
    //     $log->entity_id = entity()->id??0;
    //     $log->row_id = 0;
    //     $log->type = 'Logged In';
    //     $log->table = 'User';
    //     $log->save();
    //     $request->authenticate();

    //     $request->session()->regenerate();


    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }
    public function store(Request $request)
    {
        // Validate the user's credentials
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Attempt to authenticate the user
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $this->logOutOtherDevices($request->password);

        // Regenerate the session
        $request->session()->regenerate();

        // Log login event if needed
        // Your code for logging...

        // Redirect to the intended dashboard
        return redirect()->intended(route('dashboard'));
    }

    protected function logOutOtherDevices($password)
    {
        // Ensure the correct password is passed to logout from other devices
        Auth::logoutOtherDevices($password);
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {


        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
