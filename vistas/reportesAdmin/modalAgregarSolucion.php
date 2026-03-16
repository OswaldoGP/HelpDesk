
<!-- Modal -->
<form id="frmAgregarSolucionReporte" method="POST" onsubmit="return agregarSolucionReporte()">
    <div class="modal fade" id="modalAgregarSolucionReporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Escribe la solucion </h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="solucion">Descripcion de la solucion</label>
                <textarea name="solucion" id="solucion" class="form-control" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary">Guardar</button>
            </div>
            </div>
        </div>
    </div>
</form>