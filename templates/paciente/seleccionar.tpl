{include file="templates/header.tpl"}

<div class="mt-5 w-25 mx-auto" style="display: contents;">
    <div class="fullscreen-modal" tabindex="-1" role="dialog" style="display: contents;">
    <div class="modal-dialog" role="document">
        <div class="modal-content seleccion" style="width: 600px; background-color: rgba(137, 43, 226, 0.5);">
            <div class="modal-header">
                <h3 class="modal-title">{$tituloIndex}</h3>
            </div>
            <div class="modal-body">
                <div>
                    <form method="POST" class="d-flex mt-3 mb-5 col-10" action="buscarRangoHorarioMedico">            
                        <select name="medico" class="form-select   col-4" id="inputGroupSelect04" aria-label="Example select with button addon"
                            required>
                            <option value="false" disabled selected>Médicos</option>

                            {foreach from=$medicos item=$medico}
                                {if isset($medico->id) }
                                    <option value="{$medico->id}">{$medico->apellido}, {$medico->nombre}</option>
                                {/if}
                            {/foreach}
                        </select>
                        <button class="btn btn-secondary" type="submit">Buscar</button> 
                    </form>   
                </div>
                <div>
                    <form method="POST" class="d-flex mt-3 mb-5 col-10" action="buscarMedicosPorObraSocial">            
                            <select name="obraSocialSelect" class="form-select   col-4" id="inputGroupSelect04" aria-label="Example select with button addon"
                                required>
                                <option value="false" disabled selected>Obra Social</option>
                                        <option value="particular"> Atención Particular</option>
                                {foreach from=$obrasSociales item=$obraSocial}        
                                    {if isset($obraSocial->id) }       
                                        <option value="{$obraSocial->id}">{$obraSocial->nombre_os}</option>
                                    {/if}
                                {/foreach}
                            </select>
                        <button class="btn btn-secondary" type="submit">Buscar</button> 
                    </form>            
                </div>
                <div>
                    {include file="templates/paciente/formSearch.tpl"}
                </div>
            </div>
        </div>
    </div>
</div>
{include file="templates/footer.tpl" assign=name var1=value}