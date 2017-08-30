<?php 
use App\Empleado;
use App\Incidencia;
use App\Puesto;
use App\Servicio;
use App\Unidad;

use Carbon\Carbon;

function fecha_ymd($date){
	return date('Y-m-d', strtotime(str_replace('/', '-', $date)));
}
function fecha_dmy($date){
	return date('d/m/Y', strtotime(str_replace('/', '-', $date)));
}
function getEmpleado($num_empleado){
  $empleado = Empleado::where('num_empleado', $num_empleado)->first();
  if ($empleado) {
    return $empleado['nombre'];
  }
  else{
    return "";
  }
  
}
function getIncidencia($incidencia){
  $incidencia = Incidencia::where('incidencia', $incidencia)->first();
  return $incidencia['descripcion'];
}
function getPuesto($puesto){
  $puesto = Puesto::where('puesto', $puesto)->first();
  return $puesto['descripcion'];
}
function getServicio($servicio){
  $servicio = Servicio::where('servicio', 'like', '%'.$servicio.'%')->first();
  return $servicio['descripcion'];
}
function getUnidad($unidad){
  $unidad = Unidad::where('clave', 'like', '%'.$unidad.'%')->first();
  return $unidad['descripcion'];
}