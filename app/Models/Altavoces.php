<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Altavoces extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'precio',
        'modelo',
        'marca',
        'foto',
        'descripcion'
    ];


      public function alquiler()
      {
          return $this->hasMany(Alquileres::class)->whereNull('fecha_devolucion');
      }
}
