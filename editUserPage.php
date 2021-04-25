
<?php include "authentication.php"; ?>
<?php 
    include_once "Layout/layoutSimpleHeader.php";
    require "DbFactory.php";
?>

<?php 
    $idUsuario = $_GET['idUsuario'];
    $User = $db->Usuario()->getPorCodigo($idUsuario);
?>


<div id="loginbBody">

    <span>Editar <?php echo($User->getLogin())?></span>

    <div id="loginContent">
        <div class="formArea" id="loginFormArea">
            <form>
                <div class="formGroup">
                    <label for="inputUsername">Nome:</label>
                    <input type="text" id="inputName" name="inputName" value="<?php echo($User->getName())?>">
                    <input type="hidden" id="inputIdUsuario" value="<?php echo($User->getId())?>">
                </div>

                <button class="corsBtn btn-purple" type="button" id="btn-edit-user">Salvar</button>

            </form>
        </div>
    </div>



</div>

<?php include_once "Layout/layoutFooter.php"; ?>