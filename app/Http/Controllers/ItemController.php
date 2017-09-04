<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Excel;
use App\Report;

class ItemController extends Controller
{

    public function import(Request $request)
    {
      Report::truncate();
      
      if($request->file('imported-file'))
      {
                $path = $request->file('imported-file')->getRealPath();
                $data = Excel::load($path, function($reader)
          {
                })->get();

          if(!empty($data) && $data->count())
          {
            foreach ($data->toArray() as $row)
            {
              if(!empty($row))
              {
                $dataArray[] =
                [
                  'nombre_suplente' => $row['nombre_suplente'],
                  'puesto' => getPuesto($row['puesto']),
                  'servicio' => getServicio($row['servicio']),
                  'unidad' => getUnidad($row['unidad']),
                  'fecha_inicio' => fecha_dmy($row['fecha_inicio']),
                  'fecha_final' => fecha_dmy($row['fecha_final']),
                  'qna' => $row['qna'],
                  'num_empleado_trabajador' => getEmpleado($row['num_empleado_trabajador']),
                  'cod_incidencia' => getIncidencia($row['cod_incidencia']),
                  'percepcion' => $row['percepcion']
                ];
              }
          }
          if(!empty($dataArray))
          {
             Report::insert($dataArray);
             

           }
         }
       }
      $items = Report::all();
      Excel::create('items', function($excel) use($items) {
          $excel->sheet('ExportFile', function($sheet) use($items) {
              $sheet->fromArray($items);
          });
      })->export('xls');
    
    }

}
