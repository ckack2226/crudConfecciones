@extends('plantilla')
@section('contenido')
<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white">Editar Información Cliente</div>
            <div class="card-body">
                <form id="frmCliente" method="POST" action="{{ url('clientes',[$cliente])}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre}}" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $cliente->apellido}}" placeholder="Apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono}}" placeholder="Teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $cliente->direccion}}" placeholder="Dirección" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Actualizar</button>
                </form>
            </div>

        </div>
    </div>

</div>
@endsection