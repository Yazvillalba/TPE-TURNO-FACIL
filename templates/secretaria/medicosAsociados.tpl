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
                <td><a href="medicoAsociadoSecretaria/{$secretaria->id_secretaria}" class = "btn btn-outline-danger">Asociar Medico</a></td>             
            </tr>
        {/if}
        {/foreach}  
        </tbody>
        <tfoot></tfoot>
    
    </table>
</div>    

    
   



{include file="templates/footer.tpl" assign=name var1=value}