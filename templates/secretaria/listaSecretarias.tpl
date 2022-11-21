{include file="templates/header.tpl"}

    <div class="container ">                
        <table class="table" style="background-color: white;">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Eliminar</th>       
                    <th scope="col">Modificar</th>     
                    <th scope="col">Medico Asociados</th>                      
                </tr>
            </thead>

            <tbody>
                {foreach from=$secretarias item=$secretaria }
                    <tr>   
                        <td>{$secretaria->nombre}</td>   
                        <td>{$secretaria->apellido}</td>
                        <td><a href="borrarSecretaria/{$secretaria->id_secretaria}" class = "btn btn-outline-danger">Eliminar</a></td>
                        <td><a href="renderModificarSecretaria/{$secretaria->id_secretaria}" class = "btn btn-outline-danger">Modificar</a></td>
                        <td><a href="medicoAsociadoSecretaria/{$secretaria->id_secretaria}" class = "btn btn-outline-danger">Ver Medicos Asociados</a></td>
                    </tr>
                {/foreach}     
                
            </tbody>
          
            <tfoot>
                
            </tfoot>
        </table>
        
    </div>

{include file="templates/footer.tpl" assign=name var1=value}