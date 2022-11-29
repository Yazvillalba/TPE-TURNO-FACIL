{include file="templates/header.tpl" }

<div class="d-flex">

    <div class="mx-auto">
        <h3>Ingresar Nueva Secretaria</h3>
        <div class="fullscreen-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ingresar Secretaria</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="ingresarSecretaria">
                                <div class="form-group">
                                    <label for="nombre">Ingresar nombre</label>
                                    <input type="text" name="nombre" required="required" class="form-control" maxlength="8" placeholder="Nombre"/>
                                    <label for="apellido">Ingresar apellido</label>
                                    <input type="text" name="apellido" required="required" class="form-control" maxlength="8" placeholder="Apellido"/>
                                </div>
                                {if $error}
                                    <div class="alert alert-danger mt-3">
                                        {$error}
                                    </div>
                                {/if}
                            <button type="submit " class="btn btn-secondary mt-3" style="background-color: blueviolet;">INGRESAR</button>
                        </form>
                    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="mt-5 w-25 mx-auto">
        <h3 class="text-center">Registro de Secretarias</h3>
        {include file ="templates/formRegister.tpl"}
</div>
{include file="templates/footer.tpl" }