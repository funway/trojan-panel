<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Carbon\Carbon;

use App\Utils\Helper;

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
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $trojan_token = Helper::generateRandomCode();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'login_password' => Hash::make($request->password),
            
            'expire_at' => Carbon::now('UTC')->addHours(3),            
            'trojan_token' => $trojan_token,
            'subscription_token' => Helper::generateRandomCode(),
            'password' => hash('sha224', $request->name . ':' . $trojan_token),
        ]);

        // info($user->toJson());
        // $user->refresh();
        // $user->password = hash('sha224', $user->id . ':' . $user->trojan_token);
        // $user->save();
        // info($user->toJson());

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
