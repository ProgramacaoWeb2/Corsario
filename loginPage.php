<?php include_once "Views/Layout/layoutSimpleHeader.php"; ?>


<div id="loginbBody">

    <span>Login do cliente</span>

    <div id="loginFormArea">
        <form action="">
            <div class="formGroup">
                <label for="inputUsername">E-mail:</label>
                <input type="text" id="inputUsername" placeholder="Ex. joaodasilva@gmail.com">
            </div>

            <div class="formGroup">
                <label for="inputPassword">Senha:</label>
                <input type="password" id="inputPassword">
            </div>

            <button class="corsBtn" type="submit" id="btnLogin">Continuar</button>

        </form>
    </div>

</div>

<?php include_once "Views/Layout/layoutFooter.php"; ?>