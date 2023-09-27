@extends('plantilla')
@section('contenido')
<div class="card mt-3">
    <div class="card-header bg-dark text-white">Editar Información Cliente</div>
    <div class="card-body">
        <form method="POST" action="{{ url('pedido',[$pedido])}}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="fecha_entrega">Fecha de Entrega:</label>
                <input type="date" class="form-control" id="fecha_entrega" value="{{ date('Y-m-d', strtotime($pedido->fecha_del_entrega)) }}" name="fecha_entrega" required>
                
            </div>
            <div class="form-group">
                <label for="descripcion_pedido">Descripción del Pedido:</label>
                <textarea class="form-control" id="descripcion_pedido" name="descripcion_pedido" rows="4" required>{{ $pedido->descripcion_del_pedido }}</textarea>
            </div>
            <div class="form-group">
                <label for="cantidad_pedido">Cantidad del Pedido:</label>
                <input type="number" class="form-control" id="cantidad_pedido" value="{{ $pedido->cantidad_del_pedido }}" name="cantidad_pedido" required>
            </div>
            <div class="form-group">
                <label for="descripcion_abono">Descripción del abono:</label>
                <textarea class="form-control" id="descripcion_abono" name="descripcion_abono" rows="4" required>{{ $pedido->descripcion_de_abono }}</textarea>
            </div>
            <div class="form-group">
                <label for="abonado">Abonado:</label>
                <input type="number" class="form-control" id="abonado" value="{{ $pedido->Abonado }}" name="abonado" required>
            </div>
            <div class="form-group">
                <label for="total_pedido">Total del Pedido:</label>
                <input type="number" class="form-control" id="total_pedido" value="{{ $pedido->total_del_pedido }}" name="total_pedido" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Guardar Cambios</button>
        </form>
    </div>
</div>
@endsection