@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Factura</h3>
                <form action="http://agentedesegurosmba.com/facturacion/ejemplos/cfdi33/ejemplo_factura - copia.php" method="post" id="facturaForm">
                    <label for="">Producto</label>
                    <input type="text" name="producto" id="producto" class="form-control" placeholder="Escribe el producto aquí">
                    <button type="submit" class="mt-3 btn btn-success">Enviar</button>
                </form>
                <a href="" id="datos" class="mt-3 btn btn-secondary disabled">Descargar Factura</a>
            </div>
        </div>
    </div>
    <script src="{{asset('js/factura/factura.js')}}"></script>
@endsection