@extends('plantilla')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('contenido')

<div class="container mt-5">
    <h1>Lista de Pedidos</h1>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAgregarPedido">
        <i class="fa-solid fa-shirt"></i>
        Agregar pedido
    </button>
    <table id="pds" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Fecha del Pedido</th>
                <th>Fecha de Entrega Aproximada</th>
                <th>Descripción del Pedido</th>
                <th>Cantidad del Pedido</th>
                <th>Descripción del abono</th>
                <th>Abonado</th>
                <th>Total del Pedido</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>

            @php $i=1;@endphp
            @foreach($pedidos as $pedido)

            @php
            $clienteModel = App\Models\Clientes::find($pedido->cliente_id);
            $nombre = $clienteModel->nombre;
            $apellido = $clienteModel->apellido;
            @endphp
            <tr>
                <td>{{ $i++}}</td>
                <td>{{ $nombre . ' ' . $apellido }}</td>
                <!-- <td>{{ $pedido->cliente_id }}</td> -->
                <td>{{ date('d/m/Y', strtotime($pedido->fecha_del_pedido)) }}</td>
                <td>{{ date('d/m/Y', strtotime($pedido->fecha_del_entrega)) }}</td>
                <td>{{ $pedido->descripcion_del_pedido }}</td>
                <td>{{ $pedido->cantidad_del_pedido }}</td>
                <td>{{ $pedido->descripcion_de_abono }}</td>
                <td>{{ number_format($pedido->Abonado, 0, ',', '.') }}</td>
                <td>{{ number_format($pedido->total_del_pedido, 0, ',', '.') }}</td>


                <td>
                    <div class="d-flex">
                        <a href="{{ url('pedido',[$pedido]) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-edit"></i> Actualizar</a>
                        <form action="{{ url('pedido',[$pedido]) }}" method="POST" class="no-margin">
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
        new DataTable('#pds');
    </script>
    @endsection
</div>

<div class="modal fade" id="modalAgregarPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('pedido')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_pedido">Fecha del Pedido:</label>
                        <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_entrega">Fecha de Entrega:</label>
                        <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion_pedido">Descripción del Pedido:</label>
                        <textarea class="form-control" id="descripcion_pedido" name="descripcion_pedido" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cantidad_pedido">Cantidad del Pedido:</label>
                        <input type="number" class="form-control" id="cantidad_pedido" name="cantidad_pedido" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion_pedido">Descripción del abono:</label>
                        <textarea class="form-control" id="descripcion_abono" name="descripcion_abono" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="abonado">Abonado:</label>
                        <input type="number" class="form-control" id="abonado" name="abonado" required>
                    </div>
                    <div class="form-group">
                        <label for="total_pedido">Total del Pedido:</label>
                        <input type="number" class="form-control" id="total_pedido" name="total_pedido" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Pedido</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection