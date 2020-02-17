<div class="modal fade" id="modalFacturas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFacturarH5">Generar Contrarecibo</h5>
            </div>
            <div class="modal-body">
                <!-- ESTO SE TIENE QUE IR CON EL ARREGLO -->
                    <label for="">Fecha estimada de pago</label>
                    <input type="text" required readonly name="fechaEstimadaPago" id="fechaEstimadaPago" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="cambiarStatus" onclick="cambiarStatus()">Generar</button>
            </div>
        </div>
    </div>
</div>
