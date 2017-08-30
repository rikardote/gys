<?php

namespace App;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
      'nombre_suplente',
      'puesto',
      'servicio',
      'unidad',
      'fecha_inicio',
      'fecha_final',
      'qna',
      'num_empleado_trabajador',
      'cod_incidencia',
      'percepcion'
    ];
}


