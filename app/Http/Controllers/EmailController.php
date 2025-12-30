<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmailController extends Controller
{
    public function change_email()
    {
        return view('email.change-email');
    }

    public function update_email(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ], [
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'El campo contraseña es obligatorio.'
        ]);

        /** @var User $user */
        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'la contraseña es incorrecta.']);
        }

        $code = random_int(100000, 999999);

        $user->pending_email = $request->email;
        $user->email_change_code = $code;
        $user->email_change_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

        Mail::to($user->pending_email)->send(
            new \App\Mail\EmailChangeCodeMail($code)
        );

        return redirect()->route('email.verify')->with('success', 'Se ha enviado un código de verificación a su nuevo correo electrónico.');
    }

    public function verify_email()
    {
        return view('email.verify-code');
    }

    public function verify_code(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6',
        ]);

        /** @var User $user */
        $user = Auth::user();

        if ($user->email_change_code !== $request->code) {
            return back()->withErrors(['code' => 'El código de verificación es incorrecto.']);
        }

        if (Carbon::now()->greaterThan($user->email_change_expires_at)) {
            return back()->withErrors(['code' => 'El código de verificación ha expirado.']);
        }

        $user->email = $user->pending_email;
        $user->pending_email = null;
        $user->email_change_code = null;
        $user->email_change_expires_at = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Su correo electrónico ha sido actualizado correctamente.');
    }
}
