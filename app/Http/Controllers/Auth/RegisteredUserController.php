<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                // 'password' => [
                //     'required',
                //     'confirmed',
                //     Password::min(8)
                //         ->letters()
                //         ->mixedCase()
                //         ->numbers()
                //         ->symbols()
                //         // ->uncompromised()
                // ],
                'password' => [
                    'required',
                    'confirmed',
                    'regex:/^\d{8}$/', // Exactly 8 digits
                ],
            ],
            [
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'email.unique' => 'This email address is already registered.',
                'password.required' => 'The password field is required.',
                'password.confirmed' => 'The password confirmation does not match.',
                'password.min' => 'The password must be at least :min characters.',
                'password.letters' => 'The password must contain at least one letter.',
                'password.mixedCase' => 'The password must contain both uppercase and lowercase letters.',
                'password.symbols' => 'The password must contain at least one symbol.',
                'password.numbers' => 'The password must contain at least one number.',
                'password.uncompromised' => 'The password has appeared in a data leak. Please choose a different password.',
            ]
        );


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_registered' => 1,
            'is_demo' => 1,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        // return redirect(RouteServiceProvider::HOME);

    }
}
