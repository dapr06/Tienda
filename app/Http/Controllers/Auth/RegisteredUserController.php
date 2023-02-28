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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'direccion' => ['required', 'string', 'max:255'],
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'direccion' => $request->direccion,

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    //Editar direccion
    public function editDireccion(){
        $user = Auth::user();
        return view('auth/edit-direccion', compact('user'));

    }

    // Para editar y actualizar direccion
    public function updateDireccion(Request $request)
    {
        // Validar la petición
        $request->validate([
            'direccion' => ['required','string','max:255'],
        ]);

        // Obtener el usuario actual
        $user = Auth::user();

        // Actualizar la dirección del usuario
        $user->direccion = $request->direccion;
        $user->save();

        // Redirigir al usuario a la pagina de pago
        return redirect()->route('lineaPedidos.pago');
    }




}
