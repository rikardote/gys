<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Excel;
use App\Report;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items');
    }
    public function import(Request $request)
    {
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
                  'cod_incidencia' => getIncidencia($row['cod_incidencia'])
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

      //return view('listado')->with('items', $items);
    }


      public function export(){
          $items = Report::all();
          Excel::create('items', function($excel) use($items) {
              $excel->sheet('ExportFile', function($sheet) use($items) {
                  $sheet->fromArray($items);
              });
          })->export('xls');

        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
