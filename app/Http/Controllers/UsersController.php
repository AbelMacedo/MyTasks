<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'surnames' => $request->surnames,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente.');
    }

    public function edit(): View
    {
        $user = User::findOrFail(Auth::id());
        return view('users.edit-profile', compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        $user = User::findOrFail(Auth::id());

        $user->update([
            'name' => $request->name,
            'surnames' => $request->surnames,
        ]);

        return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
    }
}
