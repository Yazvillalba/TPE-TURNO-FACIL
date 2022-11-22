{include file="templates/header.tpl" }

<div class="d-flex">
    <div class=" mx-auto">
        <h3>Ingresar Nuevo Médico</h3>
        <div class="fullscreen-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ingresar Médico</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="ingresarMedico">
                                <div class="form-group">
                                    <label for="nombre">Ingresar nombre</label>
                                    <input type="text" name="nombre" required="required" class="form-control" maxlength="8" placeholder="Nombre"/>
                                    <label for="apellido">Ingresar apellido</label>
                                    <input type="text" name="apellido" required="required" class="form-control" maxlength="8" placeholder="Apellido"/>
                                    <label for="matricula">Ingresar número de matrícula</label>
                                    <input type="text" name="matricula" required="required" class="form-control" maxlength="8" placeholder="Matrícula"/>
                                    <label for="importe_consulta">Ingresar importe consulta</label>
                                    <input type="double" name="importe_consulta" required="required" class="form-control" maxlength="8" placeholder="Importe"/>
                                    <label for="especialidad">Ingresar especialidad</label>
                                    <input type="text" name="especialidad" required="required" class="form-control" maxlength="8" placeholder="Especialidad"/>
                                    <label for="dia">Ingresar día de trabajo</label>
                                    <input type="text" name="dia" required="required" class="form-control" maxlength="8" placeholder="Día"/>
                                    <label for="desde">Ingresar horario de comienzo de atención</label>
                                    <input type="time" name="desde" required="required" class="form-control" maxlength="8" placeholder="Desde"/>
                                    <label for="hasta">Ingresar horario de fin de atención</label>
                                    <input type="time" name="hasta" required="required" class="form-control" maxlength="8" placeholder="Hasta"/>
                                    
                                    <select class="form-select mt-2 mb-4" name="id_secretaria" aria-label="Default select example">
                                        <option value="0" >Elija la secretaria a asignar</option>
                                        {foreach from=$secretarias item=$secretaria}
                                        <option value="{$secretaria->id_secretaria}">{$secretaria->nombre}, {$secretaria->apellido}</option>
                                        {/foreach}
                                    </select> 
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
</div>
{include file="templates/footer.tpl" }