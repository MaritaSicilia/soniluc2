<?php

namespace App\Http\Controllers;

use App\Models\Altavoces;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class AltavocesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $altavoces = Altavoces::all();
        // Para cargar la imagen que tenemos en public storage
        $url = 'storage/img/';
        return view('altavoz.index', ['altavoces' => $altavoces, 'url' => $url]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("altavoz.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'precio' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'foto' => 'required|image',
            'descripcion' => 'required'
        ]);
        try {
            $mialtavoz = new Altavoces();
            $mialtavoz->precio = $request->precio;
            $mialtavoz->marca = $request->marca;
            $mialtavoz->modelo = $request->modelo;
            $mialtavoz->foto = $request->foto;
            $nombrefoto = time() . "-" . $request->file('foto')->getClientOriginalName();
            $mialtavoz->foto = $nombrefoto;
            $mialtavoz->descripcion = $request->descripcion;
            $mialtavoz->save();
            $request->file('foto')->storeAs('public/img', $nombrefoto);
            return redirect()->route('altavoz.index')->with('status', 'Producto creado correctamente');
        } catch (QueryException $exception) {
            return redirect()->route('altavoz.index')->with('status', 'No se ha podido crear el producto');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Para recuperar el modelo del altavoz por su id
        $altavoz = Altavoces::findOrFail($id);
        $url = 'storage/img/';
        return view('altavoz.show')->with('altavoz', $altavoz)->with('url', $url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        // Para recuperar el altavox por su id
        $altavoz = Altavoces::findOrFail($id);
        // Para cargar la imagen que tenemos en public storage (El de arriba)
        $url = 'storage/img/';
        return view('altavoz.edit')->with('altavoz', $altavoz)->with('url', $url);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'precio' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'foto' => 'image',
            'descripcion' => 'required'
        ]);
        try {
            // Carga los datos del altavoz
            $mialtavoz = Altavoces::findOrFail($id);
            $mialtavoz->precio = $request->precio;
            $mialtavoz->marca = $request->marca;
            $mialtavoz->modelo = $request->modelo;
            // Si se ha subido foto se crea
            if (is_uploaded_file($request->foto)) {
                $nombrefoto = time() . "-" . $request->file('foto')->getClientOriginalName(); // Guarda en la variable la foto con la fecha y el nombre original
                $mialtavoz->foto = $nombrefoto;
                $request->file('foto')->storeAs('public/img', $nombrefoto); // Para guardar la imagen en la ruta de storage/public/img y con el nombre de la foto
            }
            $mialtavoz->descripcion = $request->descripcion;
            $mialtavoz->save(); // Edita en la base de datos el libro
            return redirect()->route('altavoz.index')->with('status', 'Altavoz editado correctamente'); // Una vez subido redirige al index y crea una variable de sesion status
        } catch (QueryException $exception) {
            return redirect()->route('altavoz.index')->with('status', 'No se ha podido editar el altavoz'); // Si da error mostramos el mensaje de que no se ha podido crear el libro
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Cargo los datos del libro por su id
        $mialtavoz = Altavoces::findOrFail($id);
        $mialtavoz->delete();
        return redirect()->route('altavoz.index')->with('status', 'Altavoz borrado correctamente');
    }
}
