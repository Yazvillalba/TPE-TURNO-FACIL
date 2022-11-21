{include file="templates/header.tpl" }

<div class="alert alert-danger mt-5 w-25 mx-auto"  role="alert">
    <h4 class="alert-heading">Advertencia:</h4>
    <p>{$error}</p>
    <hr>
    <hr>
    <a class="mb-0 btn-primary" href={BASE_URL}>Volver</a>
</div>

{include file="templates/footer.tpl"}
