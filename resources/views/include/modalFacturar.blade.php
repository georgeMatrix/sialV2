<div class="modal fade" id="modalFacturar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFacturarH5">Facturación</h5>

            </div>
            <div class="modal-body">
                <!-- ESTO SE TIENE QUE IR CON EL ARREGLO -->
                <form action="{{route('facturas.store')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                    <label for="">Lugar de expedición</label>
                    <input type="text" class="form-control">
                    <label for="">Método de pago</label>
                    <select name="metodo_pago" id="metodo_pago" class="form-control">
                        <option value="ppd">PPD</option>
                        <option value="pue">PUE</option>
                    </select>
                    <label for="">Forma de pago</label>
                    <select name="forma_pago" id="forma_pago" class="form-control">
                        @for($i=1; $i<29; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                            <option value="99">99</option>
                    </select>
                    <label for="">Moneda</label>
                    <input type="text" class="form-control">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.reload()">Cerrar</button>
                <button type="button" class="btn btn-primary" id="cambioRelease" onclick="cambioAbiertaToRelease()">Generar</button>
            </div>
        </div>
    </div>
</div>