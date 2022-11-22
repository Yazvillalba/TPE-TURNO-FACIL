{include file="header.tpl"}
<form action="confirmarMedico" class="form-group" method="POST" enctype="multipart/form-data">
    <div class="d-flex justify-content-center">

        <div class="border border-radius w-50 p-2 px-5 ">
            <h4 class="h4 my-4 text-center">Modificar Medico</h4>
            <div class="p-2">
                <input type="text" class="form-control mt-2" name="nombre" placeholder="Nombre Medico">
                <input type="text" class="form-control mt-2" name="apellido" placeholder="Apellido">
                <input type="text" class="form-control mt-2" name="matricula" placeholder="matricula">
                <input type="double" class="form-control mt-2" name="importe_consulta" placeholder="importe de consulta">
                <input type="text" class="form-control mt-2" name="especialidad" placeholder="especialidad">
                <input type="text" class="form-control mt-2" name="dia" placeholder="dia de atencion">
                <input type="time" class="form-control mt-2" name="desde" placeholder="Desde hora...">
                <input type="time" class="form-control mt-2" name="hasta" placeholder="Hasta hora...">
                <div class="d-flex flex-row justify-content-center">

                    <input type="hidden" value="{$id}" class="form-control " name="id">
                    <button type="submit" class="btn btn-outline-success col-auto m-2">Confirmar</button>
                    <a href="listaMedicos" class="btn btn-danger  col-auto m-2">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>
{include file="footer.tpl"}