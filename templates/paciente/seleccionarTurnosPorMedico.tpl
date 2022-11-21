 {include file="templates/header.tpl"}

    <div class="container ">

    <h3>{$tituloIndexTurnos}</h3>
    
    <div>
        <div class="d-flex justify-content-between">
        <h3>Médico: {$tituloMedico} </h3>
        {if $trabajaOS === true}
            <h5 class="alert alert-success w-25">Este medico trabaja con tu obra social</h5>  
        
        {else}
            <h5 class="alert alert-danger w-25">Este medico no trabaja con tu obra social</h5>
        {/if}
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Seleccionar</th>

                </tr>
            </thead>

            <tbody>
                {foreach from=$turnos item=$turno }
                {if $turno->id_paciente === null}
                    <tr>   
                        <td> {$turno->dia}</td>       
                        <td>{$turno->fecha}</td>
                        <td>{$turno->horario}</td>
                        <td><a class="btn btn-secondary" style= "background-color:blueviolet;" href="{BASE_URL}tomarTurno/{$turno->id}">Tomar turno</a> </td>
                    </tr>
                    
                {/if}
                    
                {/foreach}     
            </tbody>
          
            <tfoot>

            </tfoot>
        </table>
        
    </div>

{include file="templates/footer.tpl" assign=name var1=value}