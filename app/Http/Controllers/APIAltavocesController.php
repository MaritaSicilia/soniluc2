<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiAltavocesRequest;
use Illuminate\Http\Request;
use App\Models\Altavoces;

class APIAltavocesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $altavoces=Altavoces::all();
        //llamamos a la base de datos por json y ponemos lo q queremos q devuelva
        return response()->json([
            'status'=>true,
            'altavoces'=>$altavoces
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiAltavocesRequest $request)
    {
          //creamos una instancia del modelo, como queremos q devuelva todo ponemos all
          $altavoces=Altavoces::create($request->all());
          return response()->json([
              'status'=>true,
              'message'=>'Altavoces creados correctamente',
              'altavoces'=>$altavoces
          ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $altavoces=Altavoces::findOrFail($id);
        return response()->json([
            'status'=>true,
            'altavoces'=>$altavoces
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiAltavocesRequest $request, string $id)
    {
            //buscamos uno y actualizamos con los datos q manda el usuario
            $altavoces=Altavoces::findOrFail($id);
            $altavoces->update($request->all());
            return response()->json([
                'status'=>true,
                'message'=>'altavoces creado correctamente',
                'altavoces'=>$altavoces
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
           //
           $altavoces = Altavoces::findOrFail($id);
           $altavoces ->delete();
           return response()->json([
               'status'=>true,
               'message'=>'altavoces borrado correctamente',
               'altavoces'=>$altavoces
           ]);
    }
}
