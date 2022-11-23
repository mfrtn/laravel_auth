<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'login_limit_number' => ['nullable', 'integer'],
            'password' => [
                'required', 'confirmed',
                Rules\Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
        ]);

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'login_limit_number' => $request->login_limit_number,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user)); //for Sending User Mobile Verification Token 

        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
