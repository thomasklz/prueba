
@extends('plantilla.app')

@section('contenido')

    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">:: Venta de Productos ::</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('venta',$producto->id )}}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
                <label >Categoria</label>
                <select name="tipo_id" >
                    @foreach ($tipos as $item)
                        <option value="{{$item->id}}">{{$item->tipo}}</option>
                    @endforeach
                </select>
              </div>
            <div class="form-group">
              <input type="text" value="{{$producto->nombre}}" name="nombre" class="form-control" placeholder="Nombre producto">
            </div>
            <div class="form-group">
                <input disabled type="text" value="{{$producto->cantidad}}" name="cantidad" class="form-control" placeholder="Cantidad">
              </div>
              <div class="form-group">
                <input disabled type="text" value="{{$producto->precio}}" name="precio" class="form-control" placeholder="Precio">
              </div>
              <div class="form-group">
                <input type="text" name="cantidadComprar" class="form-control" placeholder="Ingrese la cantidad a comprar">
              </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>
        </form>
      </div>
    </div>
@endsection

