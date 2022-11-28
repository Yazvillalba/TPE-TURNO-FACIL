{include file='templates/header.tpl'}

<div class="container d-block">
    <div>
        <table class="table" style="background-color: white; width: 630px;">
            {foreach from=$secretarias item=$secretaria }
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre Secretaria</th>
                        <th scope="col">Apellido Secretaria</th>
                        <th scope="col">Asociar Medico</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{$secretaria->nombre}</td>
                        <td>{$secretaria->apellido}</td>

                        <td>
                            <form method="POST" action="confirmarMedicoAsociado" class="d-flex">

                                <select class="form-select me-2 " name="id_medico" aria-label="Default select example"
                                    style="min-width: fit-content;">
                                    <option value="0">Seleccionar</option>
                                    {foreach from=$medicosSelect item=$med}
                                      {if $med->id_secretaria != $secretaria->id_secretaria} 
                                         <option value="{$med->id}">{$med->nombre}, {$med->apellido}</option>
                                    {/if}
                                {/foreach}
                                </select>
                                        
                                            <input type="hidden" value="{$secretaria->id_secretaria}" name="id_secretaria"></input>
                                    
                                        
                                            
                                        
                                        <button type="submit" class="btn btn-secondary h-50"
                                        style="background-color: blueviolet;">Asignar</button> 
                             
                            </form>
                        </td>
                    </tr>
                </tbody>
                <tfoot></tfoot>

        </table>
    </div>
        <div>
            <table class="table" style="background-color: white; width: 630px;">
                <thead class="thead-light">
                    <tr>

                        <th scope="col">Nombre y apellido medico</th>

                    </tr>

                </thead>
                <tbody>
                    <tr>
                        {foreach from=$medicos item=$medico}
                            {if {$secretaria->id_secretaria} == {$medico->id_secretaria}}
                                <td>{$medico->nombre} {$medico->apellido}</td>
                            {else}
                                <td style=" background-color: red;">No hay medicos asociados</td>
                            {/if}


                        </tr>
                    {/foreach}
                </tbody>
            </table>
        {/foreach}
    </div>
    

</div>






{include file="templates/footer.tpl" assign=name var1=value}