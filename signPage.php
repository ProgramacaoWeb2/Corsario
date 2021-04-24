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
                <div class="formGroup">
                    <label for="inputUsername">E-mail:</label>
                    <input type="text" id="inputUsername" name="inputUsername" placeholder="Ex. joaodasilva@gmail.com">
                </div>

                <div class="formGroup">
                    <label for="inputPassword">Senha:</label>
                    <input type="password" id="inputPassword" name="inputPassword">
                </div>

                <div class="formGroup">
                    <label for="inputConfirmPassword">Confirmar Senha:</label>
                    <input type="password" id="inputConfirmPassword" name="inputConfirmPassword">
                </div>

                <button class="corsBtn btn-purple" type="button" id="btn-create-user">Criar Usuário</button>

            </form>
        </div>
    </div>



</div>

<?php include_once "Layout/layoutFooter.php"; ?>