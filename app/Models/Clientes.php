<?php

namespace App\Models;

// use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
class Clientes extends Model
{
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
}
