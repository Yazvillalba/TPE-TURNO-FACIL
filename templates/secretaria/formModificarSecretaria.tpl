{include file="header.tpl"}
<form action="confirmarSecretaria" class="form-group" method="POST" enctype="multipart/form-data">
    <div class="d-flex justify-content-center">

        <div class="border border-radius w-50 p-2 px-5 ">
            <h4 class="h4 my-4 text-center">Modificar Secretaria</h4>
            <div class="p-2">
                <input type="text" class="form-control mt-2" name="nombre" placeholder="Nombre Secretaria">
                <input type="text" class="form-control mt-2" name="apellido" placeholder="Apellido">
                <div class="d-flex flex-row justify-content-center">

                    <input type="hidden" value="{$id}" class="form-control " name="id">
                    <button type="submit" class="btn btn-outline-success col-auto m-2">Confirmar</button>
                    <a href="listaSecretarias" class="btn btn-danger  col-auto m-2">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>
{include file="footer.tpl"}