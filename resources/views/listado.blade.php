<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Import-Export Data</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
  </head>
  <body>
    <div class="container">
      <br />
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
          <div class="row">
            <form action="{{url('items/import')}}" method="post" enctype="multipart/form-data">
              <div class="col-md-6">
                {{csrf_field()}}
                <input type="file" name="imported-file"/>
              </div>
              <div class="col-md-6">
                  <button class="btn btn-primary" type="submit">Import</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-2">
          <form action="{{url('items/export')}}" enctype="multipart/form-data">
            <button class="btn btn-success" type="submit">Export</button>
          </form>
        </div>
      </div>
      <div class="row">
        @if(count($items))
        <table class="table table-striped">
          <thead>
            <tr>
              <td>NOMBRE</td>
              <td>PUESTO</td>
              <td>SERVICIO</td>
              <td>UNIDAD</td>
              <td>FECHA INICIO</td>
              <td>FECHA FINAL</td>
              <td>QNA</td>
              <td>EMPLEADO SUPLIDO</td>
              <td>INCIDENCIA</td>
            </tr>
          </thead>
          @foreach($items as $item)
            <tr>
              <td>{{$item->nombre_suplente}}</td>
              <td>{{$item->puesto}}</td>
              <td>{{$item->servicio}}</td>
              <td>{{$item->unidad}}</td>
              <td>{{$item->fecha_inicio}}</td>
              <td>{{$item->fecha_final}}</td>
              <td>{{$item->qna}}</td>
              <td>{{$item->num_empleado_trabajador}}</td>
              <td>{{$item->cod_incidencia}}</td>
            </tr>
          @endforeach
        </table>
        @endif
      </div>
    </div>
  </body>
</html>