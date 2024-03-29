<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('user.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        try {
            // Crea un nuevo usuario
            $user = new User();
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->dni = $request->dni;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->fecha_nac = $request->fechanac;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->rol = 'usuario';
            $user->save(); // Edita en la base de datos el usuario
            return redirect()->route('user.index')->with('status', 'Usuario editado correctamente'); // Una vez subido redirige al index y crea una variable de sesion status
            var_dump($request);
        } catch (QueryException $exception) {
            echo $exception->getMessage();
            //return redirect()->route('user.index')->with('status', 'No se ha podido editar el usuario'); // Si da error mostramos el mensaje de que no se ha podido editar usuario
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Para recuperar el modelo del user por su id
        $user = User::findOrFail($id);
        return view('user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Para recuperar el user por su id
        $user = User::findOrFail($id);
        return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Carga los datos del usuario
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->dni = $request->dni;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->fecha_nac = $request->fechanac;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->rol = 'usuario';
            $user->save(); // Edita en la base de datos el usuario
            return redirect()->route('user.index')->with('status', 'Usuario editado correctamente'); // Una vez subido redirige al index y crea una variable de sesion status

        } catch (QueryException $exception) {
            return redirect()->route('user.index')->with('status', 'No se ha podido editar el usuario'); // Si da error mostramos el mensaje de que no se ha podido editar usuario
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //Cargo los datos del usuario por su id
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('status', 'Usuario borrado correctamente');
    }
}
