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
        'descripcion',
        'alquilado'
    ];

    //pongo la relación que tengo con el user
    /*
      public function user()
      {
          return $this->belongsToMany(User::class, 'alquileres')->withPivot('fecha_devolucion');
      }
      */

      public function alquileres()
      {
          return $this->hasMany(Alquileres::class)->whereNull('fecha_devolucion');
      }
}
