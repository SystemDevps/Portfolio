<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Permite al administrador autenticado actualizar o cambiar
 * su propia contraseña de acceso al panel administrativo.
 */
class PasswordController extends Controller
{
    /**
     * Mostrar el formulario de cambio de contraseña.
     */
    public function edit()
    {
        return view('admin.password.edit');
    }

    /**
     * Validar y guardar la nueva contraseña.
     */
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed|different:current_password',
        ]);

        $user = Auth::user();

        // Verificar que la contraseña actual sea correcta.
        if (! Hash::check($request->current_password, $user->password)) {
            return back()
                ->withErrors(['current_password' => 'La contraseña actual es incorrecta.'])
                ->onlyInput('current_password');
        }

        // El cast "hashed" del modelo User encripta automáticamente el valor.
        $user->update(['password' => $request->new_password]);

        // Regenerar la sesión por seguridad.
        $request->session()->regenerate();

        return redirect()
            ->route('admin.password.edit')
            ->with('success', 'Contraseña actualizada correctamente.');
    }
}
