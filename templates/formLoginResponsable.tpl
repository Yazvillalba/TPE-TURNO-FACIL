{include file="templates/header.tpl"}

<div class="mt-5 w-25 mx-auto">
    <h4 class="p-3">Administrador</h4>
    <h4 class="p-3">Ingresá tu usuario y contraseña</h4> 
    <form action="verifyResponsable" method="post" >
            <div class="form-group">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" required="required" placeholder="Usuario" name="usuario">
                <label for="floatingInput">Usuario</label>
              </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" required="required" placeholder="Contraseña" name="password">
                <label for="floatingInput">Contraseña</label>
              </div>
            <div class="d-flex justify-content-center">
                <button class="form-control btn btn-dark mt-3 w-50 " type="submit" style="background-color: rgb(164, 84, 238);">Ingresar</button>
            </div>  
        </div>
    </form>
</div>

{if $error}
<div class="alert alert-danger mt-3">
    {$error}
</div>
{/if}

{include file="templates/footer.tpl" }