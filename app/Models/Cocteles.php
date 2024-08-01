<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocteles extends Model
{
    use HasFactory;

    protected $table = 'cocteles';
    protected $primaryKey = 'idCoctel'; 

    protected $fillable = [
        'nombre',
        'categoria',
        'esAlcoholico',
        'vaso',
        'instrucciones',
        'imagenURL',
        'ingrediente1',
        'ingrediente2',
        'ingrediente3',
        'ingrediente4',
        'ingrediente5',
        'medida1',
        'medida2',
        'medida3',
        'medida4',
        'medida5',
        'fechaModificacion',
    ];
}
