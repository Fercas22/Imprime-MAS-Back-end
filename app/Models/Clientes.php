<?php

namespace App\Models;

// use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Clientes extends Model
{
    use SoftDeletes;
    protected $table = "clientes";
    protected $primaryKey = "id_cliente";

    protected $fillable = [
        'sobrenombre',
        'nombre',
        'rfc',
        'correo',
        'celular',
        'celular2',
        'cp',
        'direccion',
        'numExterior',
        'numInterior',
        'colonia',
        'ciudad',
        'estado',
        'situacionFiscal',
        'cfdi',
        'metodoPago',
        'mayoristaMenudista',
    ];

    protected $dates = ['deleted_at'];

}
