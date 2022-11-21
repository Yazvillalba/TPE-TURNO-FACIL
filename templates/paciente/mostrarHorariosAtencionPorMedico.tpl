 {include file="templates/header.tpl"}

    <div class="container ">
    
    <h3 style="background-color: blueviolet; border-radius: 80px;width: 285px; text-align: center;">{$tituloIndexDias}</h3>

     <div>
                
        <table class="table"  style="background-color: white;" >
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
                        <td><a class="btn btn-secondary" href="{BASE_URL}buscarMedico/{$medico->id}"  style="background-color: blueviolet;">Siguiente</a> </td>
                    </tr>
                {/foreach}     
            </tbody>
          
            <tfoot>
                
            </tfoot>
        </table>
        
    </div>

{include file="templates/footer.tpl" assign=name var1=value}