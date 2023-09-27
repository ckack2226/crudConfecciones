@extends('plantilla')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('contenido')

<div class="container mt-5">
    <h1>Lista de Clientes</h1>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAgregarCliente"><i class="fa-solid fa-user-plus"></i> 
        Agregar Cliente
    </button>
    <table id='cliente' class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1;@endphp
            @foreach($clientes as $row)
            <tr>
                <td>{{ $i++}}</td>
                <td>{{ $row->nombre}}</td>
                <td>{{ $row->apellido}}</td>
                <td>{{ $row->telefono}}</td>
                <td>{{ $row->direccion}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ url('clientes',[$row]) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-edit"></i> Actualizar</a>
                        <form action="{{ url('clientes',[$row]) }}" method="POST" class="no-margin">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="status" value="2">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Eliminar</button>
                        </form>
                    </div>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    @section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.css"></script>
    <script>
        new DataTable('#cliente');
    </script>
    @endsection
</div>

<!-- Modal para Agregar Cliente -->
<div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmCliente" method="POST" action="{{ url('clientes')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


@endsection