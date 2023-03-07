<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Alquileres extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_user',
        'id_altavoz',
        'fecha_alquiler',
        'fecha_limite',
        'fecha_devolucion'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }


    public function altavoz()
    {
        return $this->belongsTo(Altavoces::class, 'id_altavoz');
    }

}
