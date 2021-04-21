<?php include_once "Layout/layoutSimpleHeader.php"; ?>


<div id="loginbBody">

    <span>Cadastre-se</span>

    <div id="loginContent">
        <div class="formArea" id="loginFormArea">
            <form action="createUser.php" method="POST">
                <div class="formGroup">
                    <label for="inputUsername">Nome:</label>
                    <input type="text" id="inputName" placeholder="João">
                </div>
                <div class="formGroup">
                    <label for="inputUsername">E-mail:</label>
                    <input type="text" id="inputUsername" placeholder="Ex. joaodasilva@gmail.com">
                </div>

                <div class="formGroup">
                    <label for="inputPassword">Senha:</label>
                    <input type="password" id="inputPassword">
                </div>

                <div class="formGroup">
                    <label for="inputConfirmPassword">Confirmar Senha:</label>
                    <input type="password" id="inputConfirmPassword">
                </div>

                <button class="corsBtn btn-purple" type="submit">Criar seu cadastro</button>

            </form>
        </div>
    </div>



</div>

<?php include_once "Layout/layoutFooter.php"; ?>