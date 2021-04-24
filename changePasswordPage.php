<?php include_once "Layout/layoutSimpleHeader.php"; ?>


<div id="loginbBody">

    <span>Cadastre-se</span>

    <div id="loginContent">
        <div class="formArea" id="loginFormArea">
            <form>
                <div class="formGroup">
                    <label for="inputUsername">Nome:</label>
                    <input type="text" id="inputName" name="inputName" placeholder="João">
                </div>
                <button class="corsBtn btn-purple" type="button" id="btn-create-user">Criar Usuário</button>

            </form>
        </div>
    </div>



</div>

<?php include_once "Layout/layoutFooter.php"; ?>