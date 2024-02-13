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
        $request->validate([
            'names' => ['required', 'string', 'max:25'],
            'second_name' => ['required', 'string', 'max:25'],
            'nacimiento' => ['required', 'date'],
            'rfc' => ['required', 'string', 'max:255'],
            'curp' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:25'],
            'calle' => ['required', 'string', 'max:255'],
            'colonia' => ['required', 'string', 'max:255'],
            'cp' => ['required', 'integer', 'min:1'],
            'ciudad' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'names' => $request->names,
            'second_name' => $request->second_name,
            'nacimiento' => $request->nacimiento,
            'rfc' => $request->rfc,
            'curp' => $request->curp,
            'telefono' => $request->telefono,
            'calle' => $request->calle,
            'colonia' => $request->colonia,
            'cp' => $request->cp,
            'ciudad' => $request->ciudad,
            'estado' => $request->estado,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
