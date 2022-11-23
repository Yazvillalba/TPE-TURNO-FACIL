{include file="header.tpl"}
<form action="modificarMedico" class="form-group" method="POST" enctype="multipart/form-data">
    <div class="d-flex justify-content-center">

        <div class="border border-radius w-50 p-2 px-5 ">
            <h4 class="h4 my-4 text-center">Modificar Médico</h4>
            <div class="p-2">
                <input type="text" class="form-control mt-2" name="nombre" value="{$medico->nombre}">
                <input type="text" class="form-control mt-2" name="apellido"  value="{$medico->apellido}">
                <input type="text" class="form-control mt-2" name="matricula" value="{$medico->matricula}">
                <input type="double" class="form-control mt-2" name="importe_consulta" value="{$medico->importe_consulta}" placeholder="sin costo">
                <input type="text" class="form-control mt-2" name="especialidad" value="{$medico->especialidad}">
                <input type="text" class="form-control mt-2" name="dia" value="{$medico->dia}">
                <input type="time" class="form-control mt-2" name="desde" value="{$medico->desde}">
                <input type="time" class="form-control mt-2" name="hasta" value="{$medico->hasta}">
                <div class="d-flex flex-row justify-content-center">

                    <input type="hidden" value="{$medico->id}" class="form-control " name="id">
                    <button type="submit" class="btn btn-outline-success col-auto m-2">Confirmar</button>
                    <a href="listarMedicos" class="btn btn-danger  col-auto m-2">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>
{include file="footer.tpl"}