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
                    <label for="">Uso Cfdi</label>
                    <select name="usoCfdi" id="usoCfdi" class="form-control">
                        <option value="G01">G01</option>
                        <option value="G02">G02</option>
                        <option value="G03">G03</option>
                        <option value="I01">I01</option>
                        <option value="I02">I02</option>
                        <option value="I03">I03</option>
                        <option value="I04">I04</option>
                        <option value="I05">I05</option>
                        <option value="I06">I06</option>
                        <option value="I07">I07</option>
                        <option value="I08">I08</option>
                        <option value="D01">D01</option>
                        <option value="D02">D02</option>
                        <option value="D03">D03</option>
                        <option value="D04">D04</option>
                        <option value="D05">D05</option>
                        <option value="D06">D06</option>
                        <option value="D07">D07</option>
                        <option value="D08">D08</option>
                        <option value="D09">D09</option>
                        <option value="D10">D10</option>
                        <option value="P01">P01</option>
                    </select>

                    <label for="">Peso</label>
                    <input type="text" class="form-control" id="peso" name="peso">
                    <label for="">Referencia</label>
                    <input type="text" class="form-control" id="referencia" name="referencia">
                    <label for="">Tipo de Cambio</label>
                    <input type="text" class="form-control" id="tipoCambio" name="tipoCambio">
                    <label for="">Condiciones de Pago</label>
                    <input type="text" class="form-control" id="condicionesPago" name="condicionesPago">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="generarFactura" onclick="generarFactura()">Generar</button>
            </div>
        </div>
    </div>
</div>