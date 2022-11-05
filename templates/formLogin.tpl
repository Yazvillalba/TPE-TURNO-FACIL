{include file="templates/header.tpl" }

<div class="mt-5 w-25 mx-auto">

        <div>
            <form method="POST" action="verify">
                <div class="form-group">
                    <label for="dni">Ingresar su DNI</label>
                    <input type="text" name="dni" required="required" class="form-control" maxlength="8" placeholder="1........3"/>
                </div>
                {if $error}
                    <div>
                        {$error}
                    </div>
                {/if}
                <button type="submit">INGRESAR</button>
            </form>
        </div>
    </div>
</div>
{include file="templates/footer.tpl" }