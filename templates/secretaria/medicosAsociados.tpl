{include file='templates/header.tpl'}

<div class="container d-flex">
    <table class="table" style="background-color: white;">
        <thead class="thead-light">
            <tr>
                <th scope="col">Nombre Secretaria</th>
                <th scope="col">Apellido Secretaria</th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$secretarias item=$secretaria }
            <tr>   
                <td>{$secretaria->nombre}</td>   
                <td>{$secretaria->apellido}</td>
            </tr>
        </tbody> 
        <tfoot></tfoot>
    </table>
    <table class="table" style="background-color: white;">
       {foreach from=$medicos item=$medico}   
        {if {$secretaria->id_secretaria} == {$medico->id_secretaria}} 
        <thead class="thead-light">
            <tr>
                <th scope="col">Nombre Medico</th>
                <th scope="col">Apellido medico</th>
                <th scope="col">Especialidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>   
                <td>{$medico->nombre}</td>
                <td>{$medico->apellido}</td> 
                <td>{$medico->especialidad}</td>
            {/if}   
            </tr>
          {/foreach} 
        </tbody> 
    {if {$secretaria->id_secretaria} != {$medico->id_secretaria}}
        <thead class="thead-light">
            <tr>
                <th scope="col">Medico</th>
                <th scope="col">Asociar Medico</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style=" background-color: red;">No hay medicos asociados</td>
                    <td>
                        <form method="POST" action="confirmarMedicoAsociado" class="d-flex">

                            <select class="form-select me-2 " name="id_medico" aria-label="Default select example" style="min-width: fit-content;">
                                <option value="0">Seleccionar</option>
                                {foreach from=$medicosSelect item=$med}
                                    
                                    <option value="{$med->id}">{$med->nombre}, {$med->apellido}</option>
                                {/foreach}
                            </select>
                        
                            <input type="hidden" value="{$secretaria->id_secretaria}" name="id_secretaria"></input>
                            <button type="submit" class="btn btn-secondary h-50" style="background-color: blueviolet;">Asignar</button>
                        </form>
                    </td>
            </tr>
        {/if}
        {/foreach}  
        </tbody>
        <tfoot></tfoot>
    
    </table>
</div>    

    
   



{include file="templates/footer.tpl" assign=name var1=value}