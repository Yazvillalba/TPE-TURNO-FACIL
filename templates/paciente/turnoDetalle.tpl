{include file="templates/header.tpl"}
<div class="container" >

    <div class="justify-content-center">


        <div class="d-flex flex-row m-1 justify-content-between">
            <div class="flex-column justify-content-center">
                <h5 class=" display-5">{$tituloTurno}</h5>

                <div class="card" style="width: 30rem;">


                    <div class="card-body">
                        <h5 class="card-title">Detalle: {$turno->apellido|capitalize}, {$turno->nombre}</h5>
                        <h6 class="card-title">Especialidad: {$turno->especialidad|capitalize}</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Día:{$turno->dia|upper}</a> </li>
                        <li class="list-group-item">Fecha:{$turno->fecha}</li>
                        <li class="list-group-item">Hora:{$turno->horario}</li>
                    </ul>

                    <div class="card-body">
                        <h5 class="card-title">Paciente: {$paciente->apellido|capitalize}, {$paciente->nombre}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Dirección: {$paciente->direccion}</li>
                        <li class="list-group-item">Celular: {$paciente->telefono}</li>
                        <li class="list-group-item">Correo electrónico: {$paciente->mail}</a> </li>
                        <li class="list-group-item">Obra social: {$obraSocialPaciente->nombre_os}</li>
                    </ul>

                   <td><a class="btn btn-secondary" style= "background-color:blueviolet;" href="{BASE_URL}confirmarTurno/{$turno->id}">Confirmar</a> </td>
                </div>
            </div>
        </div>
        

    </div>
    
</div>

{include file="templates/footer.tpl" assign=name var1=value}