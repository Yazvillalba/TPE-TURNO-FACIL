{include file="templates/header.tpl" }

<div class="mt-5 w-25 mx-auto">
    <div class="fullscreen-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Ingresar</h5>
        </div>
        <div class="modal-body">
                <form method="POST" action="verify">
                        <div class="form-group">
                            <label for="dni">Ingresar su DNI</label>
                            <input type="text" name="dni" required="required" class="form-control" maxlength="8" placeholder="1........3"/>
                        </div>
                        {if $error}
                            <div class="alert alert-danger mt-3">
                                {$error}
                            </div>
                        {/if}
                        <button type="submit " class="btn btn-secondary mt-3">INGRESAR</button>
                </form>
        </div>
        </div>
    </div>
</div>
{include file="templates/footer.tpl" }