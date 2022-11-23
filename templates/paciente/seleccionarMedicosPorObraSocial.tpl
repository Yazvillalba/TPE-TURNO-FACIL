 {include file="templates/header.tpl"}

    <div class="container ">

    <div>
        <h3 style="background-color: blueviolet; border-radius: 80px;width: 300; text-align: center;">Médicos que atienden por: {$tituloObraSocial}  </h3>
        
        <table class="table" style="background-color: white;">
            <thead>
                <tr>
                    <th scope="col">Médico</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Matrícula</th>
                    <th scope="col">Seleccionar</th>

                </tr>
            </thead>

            <tbody>
                {foreach from=$medicos item=$medico }
                    <tr>   
                        <td>{$medico->apellido}  {$medico->nombre}</td>     
                        <td>{$medico->especialidad}</td>
                        <td>{$medico->matricula}</td>
                        <td><a class="btn btn-secondary" href="{BASE_URL}buscarMedico/{$medico->id}">Ver turnos disponibles</a> </td>
                    </tr>
                {/foreach}     
            </tbody>
          
            <tfoot>

            </tfoot>
        </table>
        
    </div>

{include file="templates/footer.tpl" assign=name var1=value}