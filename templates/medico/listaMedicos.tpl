{include file="templates/header.tpl"}
<div class="container table-c" style="min-width: fit-content;">
    <table class="table" style="background-color: white;" >
        <thead class="thead-light">
            <tr>
                <th scope="col">Apellido</th>
                <th scope="col">Nombre</th> 
                <th scope="col">Matrícula</th>
                <th scope="col">Importe</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Día</th>
                <th scope="col">Desde</th>
                <th scope="col">Hasta</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
                <th scope="col">Secretaria asignada</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$medicos item=$medico }
                <tr>
                    <td>{$medico->apellido}</td>
                    <td>{$medico->nombre}</td>
                    <td>{$medico->matricula}</td>
                    <td>{$medico->importe_consulta}</td>
                    <td>{$medico->especialidad}</td>

                    <td>{$medico->dia}</td>
                    <td>{$medico->desde}</td>
                    <td>{$medico->hasta}</td>
                    <td><a href="borrarMedico/{$medico->id}" class="btn btn-outline-danger">Eliminar</a></td>
                    <td><a href="renderModificarMedico/{$medico->id}" class="btn btn-outline-danger">Modificar</a></td>
                    {foreach from=$secretarias item=$secretaria}
                        {if $medico->id_secretaria == $secretaria->id_secretaria}
                            <td>{$secretaria->nombre}{$secretaria->apellido}</td>

                        {/if}
                    {/foreach}

                    {if ($medico->id_secretaria == 0)}
                        <td>
                           
                            <form method="POST" action="confirmarAsignacionSecretaria" class="d-flex">

                                <select class="form-select me-2 " name="id_secretaria" aria-label="Default select example" style="min-width: fit-content;">
                                    <option value="0">Seleccionar</option>
                                    {foreach from=$secretarias item=$secretaria}
                                        <option value="{$secretaria->id_secretaria}">{$secretaria->nombre}, {$secretaria->apellido}</option>
                                    {/foreach}
                                </select>
                            
                                <input type="hidden" value="{$medico->id}" name="id_medico"></input>
                                <button type="submit" class="btn btn-secondary h-50" style="background-color: blueviolet;">Asignar</button>
                            </form>
                        </td>
                    {/if}
                    

                </tr>
            {/foreach}
        </tbody>
        <tfoot></tfoot>
    </table>
</div>
{include file="templates/footer.tpl" assign=name var1=value}