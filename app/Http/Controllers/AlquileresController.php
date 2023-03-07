<?php

namespace App\Http\Controllers;

use App\Models\Alquileres;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Altavoces;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class AlquileresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alquileres = Alquileres::all();
        return view('alquiler.index')->with('alquileres', $alquileres);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alquiler.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Alquileres::create([
                'id_user' => Auth::user()->id,
                'id_altavoz' => $request->id_altavoz,
                'fecha_alquiler' => now(),
                'fecha_limite' => now(),
                'fecha_devolucion' => null,
            ]);

          //  'fecha_limite' => date('Y/m/d H:i:s', strtotime("+1 weeks")),


            return redirect()->route('alquiler.index')->with('status', " se ha podido crear el alquiler: ");
        } catch (QueryException $exception) {
            return redirect()->route('alquiler.index')->with('status', "No se ha podido crear el alquiler: " . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el préstamo correspondiente al id
        $alquiler = Alquileres::findOrFail($id);

        // Obtener el usuario que ha realizado el préstamo
        $usuario = User::findOrFail($alquiler->id_user);

        // Obtener el libro que se ha prestado
        $altavoz = Altavoces::findOrFail($alquiler->id_altavoz);

        // Devuelvo la vista de detalles del préstamo
        return view('alquiler.show', compact('alquiler', 'usuario', 'altavoz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener el préstamo correspondiente al id
        $alquiler = Alquileres::findOrFail($id);

        // Obtener la lista de libros disponibles para prestar
        $altavocesDisponibles = Altavoces::whereDoesntHave('alquileres', function ($query) use ($alquiler) {
            $query->where('id', '<>', $alquiler->id)->whereNull('fecha_devolucion');
        })->get();

        // Devuelvo la vista de edición del préstamo
        return view('alquiler.edit', compact('alquiler', 'altavocesDisponibles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $alquiler = Alquileres::findOrFail($id);

            // Actualizar la fecha de devolución del préstamo
            $alquiler->fecha_devolucion = date('Y/m/d H:i:s');

            $alquiler->save();

            return redirect()->route('alquiler.index')->with('status', 'El alquiler ha sido actualizado con éxito');
        } catch (QueryException $exception) {
            return redirect()->route('alquiler.index')->with('status', 'Ha ocurrido un error al actualizar el alquiler');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Cargo los datos del libro por su id
        $mialquiler = Alquileres::findOrFail($id);
        $mialquiler->delete();
        return redirect()->route('alquiler.index')->with('status', 'Alquiler borrado correctamente');
    }
}
