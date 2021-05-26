@extends('adminlte::page')

@section('css')
<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">

@section('title', 'Almacén')

@section('content_header')
    <h1>Tabla Almacén</h1>
@stop

@section('content')

<P></P>
<p>Bienvenidos al control de tabla de los álmacenes de la Fosforera Centroamericana.</p>
<P></P>



<a href="almacen/create" class="btn btn-primary" type="submit">Crear</a>

<br><br>
<div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="almacen" class="table table-striped table-bordered table-condensed table-hover" cellspacing="0" cellpadding="0" width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código del Almacén</th>
                        <th scope="col">Nombre del Almacén</th>
                        <th scope="col">Descripción del Almacén</th>
                        <th scope="col">Fecha de Registro</th>
                        <th scope="col">Fecha de Modificación</th>
                        <th scope="col">Acción de la Columna</th>
                    </tr>
                </thead>
        <tbody>    
@foreach($almacens as $almacen)
            <tr>
                <td>
                <a class="btn btn-info btn-sm fa fa-caret-square-down"></a>
                {{$almacen->id}}
                </td>
                <td>{{$almacen->nombre_almacen}}</td>
                <td>{{$almacen->descripcion_almacen}}</td>
                <td>{{$almacen->created_at}}</td>
                <td>{{$almacen->updated_at}}</td>
                <td>
                <form action="{{route('almacen.destroy',$almacen->id)}}" method="post">
                    <a href="/almacen/{{$almacen->id}}/edit" class="btn btn-warning btn-sm fa fa-edit" onclick="return confirmedit()"></a>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm fa fa-times-circle" onclick="return confirmdelete()"></button>
                </form>
                </td>
            </tr>
@endforeach
        </tbody>  
            </table>
            </div>
       </div> 
    </div>  
</div>

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
$(document).ready(function() {
    $('#almacen').DataTable({
        "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    },
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    });
} );
</script>

<script type="text/javascript">
    function confirmdelete()
    {
        var respuesta = confirm("estas seguro de eliminar este registro");
            if (respuesta ==true)
            {
                alert("registro eliminado con exito");  
                return true
            }
            else
            {
                return false;
            }
    }
</script>

<script type="text/javascript">
    function confirmedit()
    {
        var respuesta = confirm("estas seguro de editar este registro");
            if (respuesta ==true)
            {  
                return true
            }
            else
            {
                return false;
            }
    }
</script>

@endsection
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop