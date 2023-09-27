@extends('plantilla')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('contenido')
<div class="container mt-5">
    <h1>Inventario</h1>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAgregarInventario">
        <i class="fa-solid fa-store"></i>
        Agregar al inventario
    </button>
    <table id='inventario' class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad en stock</th>
                <th>Visualización</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1;@endphp
            @foreach($inventario as $inv)
            <tr>
                <td>{{$inv->nombre_del_producto}}</td>
                <td>{{$inv->descripcion}}</td>
                <td>{{ number_format($inv->precio, 0, ',', '.') }}</td>
                <td>{{$inv->cantidad_en_stock}}</td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#imagenModal"><i class="fa-solid fa-eye"></i> Visualizar</button></td>
                <td>
                    <div class="d-flex">
                        <a href="{{ url('inventario',[$inventario]) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-edit"></i> Actualizar</a>
                        <form action="{{ url('inventario',[$inventario]) }}" method="POST" class="no-margin">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="status" value="2">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>

            <div class="modal fade" id="imagenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img style="width: -webkit-fill-available;" src="{{ asset('storage/'.$inv->product_image) }}" alt="{{ $inv->nombre_del_producto }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

    @section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.css"></script>
    <script>
        new DataTable('#inventario');
    </script>
    @endsection
</div>



<div class="modal fade" id="modalAgregarInventario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar articulo a inventario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('inventario')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre del producto</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción del producto</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Precio del producto</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Cantidad en stock</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto del producto</label>
                        <input type="file" class="form-control" accept="image/*" id="photo" name="photo">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Articulo</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection