<?php include_once "Layout/layoutHeader.php"; ?>

<?php 
    $returnUrl = @$_GET['returnUrl'];
?>


<div id="loginbBody">

    <span>Login do cliente</span>

    <div id="loginContent">
        <div class="formArea">
            <form>
                <?php if(isset($returnUrl)){ ?>
                    <input type="hidden" id="returnUrl" value="<?php echo  $returnUrl; ?>">
                <?php } ?>


                <div class="formGroup">
                    <label for="inputUsername">E-mail:</label>
                    <input type="text" id="inputUsername" placeholder="Ex. joaodasilva@gmail.com">
                </div>

                <div class="formGroup">
                    <label for="inputPassword">Senha:</label>
                    <input type="password" id="inputPassword">
                </div>

                <button class="corsBtn btn-purple" type="button" id="btn-execute-login">Continuar</button>

            </form>
        </div>
        <?php if(isset($returnUrl)){ ?>
            <label>Não tem cadastro? <a href="signPage.php?returnUrl=<?php echo  $returnUrl; ?>">Cadastre-se</a></label>
        <?php } else { ?>
            <label>Não tem cadastro? <a href="signPage.php">Cadastre-se</a></label>
          <?php }  ?>
    </div>



</div>

<?php include_once "Layout/layoutFooter.php"; ?>