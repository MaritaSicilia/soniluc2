<?php

namespace App\Http\Livewire;

use App\Models\Altavoces;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public $buscar; //representa el texto de búsqueda introducido por el usuario
    public $altavoces; //la lista de altavoces encontrados


    public function render()
    {
        $url = 'storage/img/';
        $misaltavoces = Altavoces::where('marca', 'like' , '%' . $this->buscar . '%') ->paginate(2);
        return view('livewire.search')->with('misaltavoces' , $misaltavoces)->with('url',$url);
    }
}

