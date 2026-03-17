
<form id="frmActualizaPassword" onsubmit="return resetPassword()" method="POST" >

<!-- Modal -->
    <div class="modal fade" id="modalResetPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Resetear password</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <input type="text" hidden name="idUsuarioReset" id="idUsuarioReset" >
                    <label for="">Escribe el password nuevo</label>
                    <input type="text" 
                            name="passwordReset" 
                            id="passwordReset" 
                            class="form-control" 
                            required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-warning">Cambiar password</button>
            </div>
            </div>
        </div>
    </div>

</form>