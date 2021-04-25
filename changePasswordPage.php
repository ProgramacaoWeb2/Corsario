<?php 
    include_once "Layout/layoutSimpleHeader.php";
    require "DbFactory.php";
?>

<?php 
    $idUsuario = $_GET['idUsuario'];
    $User = $db->Usuario()->getPorCodigo($idUsuario);
?>


<div id="loginbBody">

    <span>Alterar Senha <?php echo($User->getLogin())?></span>

    <div id="loginContent">
        <div class="formArea" id="loginFormArea">
            <form>
                <input type="hidden" id="inputIdUsuario" value="<?php echo($User->getId())?>">

                <div class="formGroup">
                    <label for="inputOldPassword">Senha Anterior:</label>
                    <input type="password" id="inputOldPassword" name="inputPassword">
                </div>


                <div class="formGroup">
                    <label for="inputNewPassword">Nova Senha:</label>
                    <input type="password" id="inputNewPassword" name="inputPassword">
                </div>

                <div class="formGroup">
                    <label for="inputConfirmNewPassword">Confirmar Nova Senha:</label>
                    <input type="password" id="inputConfirmNewPassword" name="inputConfirmPassword">
                </div>


                <button class="corsBtn btn-purple" type="button" id="btn-new-password">Salvar</button>

            </form>
        </div>
    </div>



</div>

<?php include_once "Layout/layoutFooter.php"; ?>