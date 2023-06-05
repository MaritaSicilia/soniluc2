<?php

namespace App\Http\Controllers;

use App\Models\Altavoces;
use App\Http\Requests\ApiAltavocesRequest;
use App\Models\Alquileres;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\DB;
use App\Http\Controllers\strotime;



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
     *//*
    public function store(Request $request)
    {
        try {
            Alquileres::create([
                'id_user' => Auth::user()->id,
                'id_altavoz' => $request->id_altavoz,
                'fecha_alquiler' => now(),
                'fecha_limite' => date('Y/m/d H:i:s', strtotime("+1 weeks")), //para ampliar la fecha para el límite de la devolución
                'fecha_devolucion' => null,
            ]);



            return redirect()->route('alquiler.index')->with('status', "Altavoz alquilado con éxito ");
        } catch (QueryException $exception) {
            return redirect()->route('alquiler.index')->with('status', "No se ha podido crear el alquiler: " . $exception->getMessage());
        }
    }
    */



    //METODO DE PRUEBA PARA DESHABILITAR EL BOTON DE ALQUILER Y TENGA FLUIDEZ LA PÁGINA
    public function store(Request $request)
{

    try {
        Alquileres::create([
            'id_user' => Auth::user()->id,
            'id_altavoz' => $request->id_altavoz,
            'fecha_alquiler' => now(),
            'fecha_limite' => date('Y/m/d H:i:s', strtotime("+1 weeks")), //para ampliar la fecha para el límite de la devolución
            'fecha_devolucion' => null,
        ]);

        // Actualizar la propiedad "alquilado" del altavoz
        $altavoz = Altavoces::findOrFail($request->id_altavoz);
        $altavoz->alquilado = true;
        $altavoz->save();

        return redirect()->route('alquiler.index')->with('status', "Altavoz alquilado con éxito");
    } catch (QueryException $exception) {
        return redirect()->route('alquiler.index')->with('status', "No se ha podido crear el alquiler: " . $exception->getMessage());
    }
}
/*
    public function store (Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'id_altavoz' => 'required'
        ]);

        try{
            $alquilerExiste = DB::table('alquiler')
            ->where('id_user' , $request->user_id)
            ->where('id_altavoz' , '!-' , $request->id_altavoz)
            ->first();

            if ($alquilerExiste){
                return direct()->route('alquiler.index' , ['alquiler' => $request->id_user])
                ->with('status' , 'El altavoz ya ha sido alquilado por otro usuario');
            }

            $rent = new Alquileres();
            $rent -> id_user = $id_user;
            $rent -> id_altavoz = $request->id_altavoz;

            $fecha_alquiler = date('Y-m-d');
            $rent->fecha_alquiler = $fecha_alquiler;

            $fechaDevolucion = date ('Y-m-d', strtotime('+7 days' , strotime($fechaSalida)));
            $rent->fechadev= $fechaDevolucion;

            $rent->save();
            return redirect()->route('alquiler.index', ['alquiler' => $rent->id_user])->with('status', 'El alquiler ha sido exitoso');
        } catch (QueryException $exception) {
            echo $exception;
            return redirect()->route('alquiler.index', ['alquiler' => $rent->id_user])->with('status', "No se ha podido crear el alquiler");
        }


        }

*/

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el préstamo correspondiente al id
        $alquiler = Alquileres::findOrFail($id);

        // Obtener el usuario que ha realizado el alquiler
        $usuario = User::findOrFail($alquiler->id_user);

        // Obtener el altavoz que se ha prestado
        $altavoz = Altavoces::findOrFail($alquiler->id_altavoz);

        // Devuelvo la vista de detalles del alquiler
        return view('alquiler.show', compact('alquiler', 'usuario', 'altavoz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener el alquiler correspondiente al id
        $alquiler = Alquileres::findOrFail($id);

        // Obtener la lista de altavoces disponibles para prestar
        $altavocesDisponibles = Altavoces::whereDoesntHave('alquileres', function ($query) use ($alquiler) {
            $query->where('id', '<>', $alquiler->id)->whereNull('fecha_devolucion');
        })->get();

        // Devuelvo la vista de edición del alquiler
        return view('alquiler.edit', compact('alquiler', 'altavocesDisponibles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiAltavocesRequest $request, string $id)
    {

        try {
         //   echo "Before findOrFail"; // Mensaje de depuración
            $alquiler = Alquileres::findOrFail($id);
          //  echo "After findOrFail"; // Mensaje de depuración
         //   var_dump($alquiler);
         //   die(); // Detener la ejecución del código después de mostrar el resultado

            // Actualizar la fecha de devolución del alquiler
            $alquiler->fecha_devolucion = date('Y/m/d H:i:s');

            $alquiler->save();

            return redirect()->route('alquiler.index')->with('status', 'El alquiler ha sido actualizado con éxito');
        } catch (QueryException $exception) {
            return redirect()->route('alquiler.index')->with('status', 'Ha ocurrido un error al actualizar el alquiler');
        }
    }



public function destroy($id)
{
    try {
        $alquiler = Alquileres::findOrFail($id);
        //   var_dump($alquiler);
        $altavoz = $alquiler->altavoz; //para obtener el altavoz relacionado con ese alquiler
//   var_dump($alquiler);
        $alquiler->delete();

        $altavoz->alquilado = false; // Actualizar el campo alquilado a false
        $altavoz->save();

        return redirect()->route('alquiler.index')->with('status', 'El alquiler ha sido devuelto con éxito');
    } catch (QueryException $exception) {
        return redirect()->route('alquiler.index')->with('status', 'Ha ocurrido un error al devolver el alquiler');
    }
}


}
