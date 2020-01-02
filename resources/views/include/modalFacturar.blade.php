<div class="modal fade" id="modalFacturar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFacturarH5">Facturación</h5>

            </div>
            <div class="modal-body">
                <!-- ESTO SE TIENE QUE IR CON EL ARREGLO -->
                <form action="{{route('facturas.store')}}" method="post" id="formModalFactura">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                    <label for="">Lugar de expedición</label>
                    <input type="text" class="form-control" id="lugarExpedicion" name="lugarExpedicion">
                    <label for="">Método de pago</label>
                    <select name="metodo_pago" id="metodo_pago" class="form-control">
                        <option value="PPD">PPD</option>
                        <option value="PUE">PUE</option>
                    </select>
                    <label for="">Forma de pago</label>
                    <select name="forma_pago" id="forma_pago" class="form-control">
                        @for($i=1; $i<29; $i++)
                            @if($i<10)
                                <option value="{{"0".$i}}">{{"0".$i}}</option>
                            @else
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                            <option value="99">99</option>
                    </select>
                    <label for="">Tipo de comprobante</label>
                    <select name="tipo_comprobante" id="tipo_comprobante" class="form-control">
                        <option value="i">I</option>
                        <option value="e">E</option>
                        <option value="n">N</option>
                    </select>
                    <label for="">Moneda</label>
                    <select name="moneda" id="moneda" class="form-control">
                        <option value="MXN">MXN</option>
                        <option value="MXN">USD</option>
                    </select>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="generarFactura" onclick="generarFactura()">Generar</button>
            </div>
        </div>
    </div>
</div>