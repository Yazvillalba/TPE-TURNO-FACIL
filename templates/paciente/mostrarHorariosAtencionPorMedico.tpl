 {include file="templates/header.tpl"}

    <div class="container ">
    
    <h3>{$tituloIndexDias}</h3>

     <div>
                
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Apellido</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Día</th>
                    <th scope="col">Desde</th>
                    <th scope="col">Hasta</th>
                    <th scope="col"></th>
                             
                </tr>
            </thead>

            <tbody>
                {foreach from=$medicos item=$medico }
                    <tr>   
                        <td>{$medico->apellido}</td>   
                        <td>{$medico->nombre}</td>
                        <td>{$medico->dia}</td>
                        <td>{$medico->desde}</td>
                        <td>{$medico->hasta}</td>
                        <td><a class="btn btn-secondary" href="{BASE_URL}buscarMedico/{$medico->id}">Siguiente</a> </td>
                    </tr>
                {/foreach}     
            </tbody>
          
            <tfoot>
                
            </tfoot>
        </table>
        
    </div>

{include file="templates/footer.tpl" assign=name var1=value}