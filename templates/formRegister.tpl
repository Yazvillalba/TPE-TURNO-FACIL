

    <form action="registro" method="post" >
        <div class="form-group">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" required="required" placeholder="nombre" name="nombre">
                <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control"  id="floatingInputValue" placeholder="juan@example.com" value="juan@example.com" required="required" name="usuario">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" required="required" placeholder="Contraseña" name="password-1">
                <label for="floatingInput">Contraseña</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" required="required" placeholder="Ingresá la contraseña nuevamente" name="password-2">
                <label for="floatingInput">Ingresá la contraseña nuevamente</label>
            </div>
            <select class="form-select me-2 " name="rol" aria-label="Default select example" style="min-width: fit-content;">
                <option value="0">Seleccionar</option>
                <option value="2">Secretaria</option>
                <option value="3">Medico</option>
                <!--<option value="1">Secretaria</option>      -->             
            </select>
            <div class="d-flex justify-content-center">
            <button class="btn btn-dark mt-3 w-50" type="submit">Registrame</button>
            </div>
        </div>
    </form>
</div>
{if $error}
<div class="alert alert-danger mt-3">
    {$error}
</div>
{/if}



