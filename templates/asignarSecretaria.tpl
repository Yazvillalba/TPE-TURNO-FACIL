{include file="header.tpl"}
<form action="confirmarAsignacionSecretaria" class="form-group" method="POST" enctype="multipart/form-data">

    <select class="form-select mt-2 mb-4" name="id_secretaria" aria-label="Default select example">
        <option value="0" >Elija la secretaria a asignar</option>
        {foreach from=$secretarias item=$secretaria}
        <option value="{$secretaria->id_secretaria}">{$secretaria->nombre}, {$secretaria->apellido}</option>
        {/foreach}
    </select>
    <button type="submit" class="btn btn-secondary mt-3" style="background-color: blueviolet;">INGRESAR</button>
</form>