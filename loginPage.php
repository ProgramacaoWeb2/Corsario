<?php include_once "Layout/layoutSimpleHeader.php"; ?>


<div id="loginbBody">

    <span>Login do cliente</span>

    <div id="loginContent">
        <div class="formArea">
            <form action="">
                <div class="formGroup">
                    <label for="inputUsername">E-mail:</label>
                    <input type="text" id="inputUsername" placeholder="Ex. joaodasilva@gmail.com">
                </div>

                <div class="formGroup">
                    <label for="inputPassword">Senha:</label>
                    <input type="password" id="inputPassword">
                </div>

                <button class="corsBtn btn-purple" type="submit">Continuar</button>

            </form>
        </div>

        <label>Não tem cadastro? <a href="signPage.php">Cadastre-se</a></label>
    </div>



</div>

<?php include_once "Layout/layoutFooter.php"; ?>