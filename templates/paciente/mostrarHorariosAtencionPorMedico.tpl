 {include file="templates/header.tpl"}

    <div class="container ">
    
    <h3>{$tituloIndexDias}</h3>

     <div>
                
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Apellido</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Días</th>
                    <th scope="col">Desde</th>
                    <th scope="col">Hasta</th>
                  
                </tr>
            </thead>

            <tbody>
                {foreach from=$medicos item=$medico }
                    <tr>   
                        <td>{$medico->apellido}</td>   
                        <td>{$medico->nombre}</td>
                        <td>{$medico->dias}</td>
                        <td>{$medico->desde}</td>
                        <td>{$medico->hasta}</td>
                    </tr>
                {/foreach}     
            </tbody>
          
            <tfoot>
                <td><a class="btn btn-primary" href="{BASE_URL}/pacienteView/{$medico->id}">Siguiente</a> </td>
            </tfoot>
        </table>
        
    </div>

{include file="templates/footer.tpl" assign=name var1=value}