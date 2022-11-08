{include file="templates/header.tpl"}

    <div class="container ">
    <h3>{$tituloIndex}</h3>

        <div>
            <form method="POST" class="d-flex mt-3 mb-5 col-3" action="buscarRangoHorarioMedico">            
                    <select name="medico" class="form-select   col-4" id="inputGroupSelect04" aria-label="Example select with button addon"
                        required>
                        <option value="false" disabled selected>Médicos</option>

                        {foreach from=$medicos item=$medico}
                            {if isset($medico->id) }
                                <option value="{$medico->id}">{$medico->apellido}, {$medico->nombre}</option>
                            {/if}
                        {/foreach}
                    </select>
                    
                     <button class="btn btn-outline-info" type="submit">Buscar</button> 
            </form>   
       
        </div>

        <div>
            <form method="POST" class="d-flex mt-3 mb-5 col-3" action="buscarMedicosPorObraSocial">            
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
                <button class="btn btn-outline-info" type="submit">Buscar</button> 
            </form>            
        </div>


        <div>
            {include file="templates/paciente/formSearch.tpl"}
        </div>


    </div>

{include file="templates/footer.tpl" assign=name var1=value}