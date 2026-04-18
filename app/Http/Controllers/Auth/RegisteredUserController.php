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
use Illuminate\Validation\ValidationException;
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
     * @throws ValidationException
     */
    public function store(\App\Http\Requests\Auth\RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->role === 'agent') {
            $role = 'agent';
            $status = 'en_attente';
        } else {
            $role = 'usager';
            $status = 'actif';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
            'status' => $status,
        ]);

        event(new Registered($user));

        if ($status === 'en_attente') {
            return redirect(route('login', absolute: false))
                ->with('status', 'Votre compte agent est en attente de validation par un administrateur.');
        }

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
