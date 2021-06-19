<?php include_once "Layout/layoutHeader.php"; ?>

<?php 
  $returnUrl = @$_GET['returnUrl'];
?>
<div id="loginbBody">

    <span>Cadastre-se</span>

    <div id="loginContent">
        <div class="formArea" id="loginFormArea">
            <form>
                <?php if(isset($returnUrl)){ ?>
                    <input type="hidden" id="returnUrl" value="<?php echo  $returnUrl; ?>">
                <?php } ?>

                <div class="formGroup">
                    <label for="inputUsername">Nome:</label>
                    <input type="text" id="inputName" name="inputName" placeholder="João" required>
                </div>
                <div class="formGroup">
                    <label for="inputUsername">E-mail:</label>
                    <input type="text" id="inputUsername" name="inputUsername" placeholder="Ex. joaodasilva@gmail.com" required>
                </div>

                <div class="formGroup">
                    <label for="inputPassword">Senha:</label>
                    <input type="password" id="inputPassword" name="inputPassword" required>
                </div>

                <div class="formGroup">
                    <label for="inputConfirmPassword">Confirmar Senha:</label>
                    <input type="password" id="inputConfirmPassword" name="inputConfirmPassword" required>
                </div>


                <?php if(isset($_SESSION["idUsuario"]) && $_SESSION["userType"] == 1){ ?>

                <div class="formGroup">
                        <label for="inputTypeUser">Tipo Usuário:</label>
                        
                        <select name="inputTypeUser" id="inputTypeUser" class="form-control">
                            <option value="0">Cliente</option>
                            <option value="1">Interno</option>
                        </select>

                 </div>

                 <?php }?>
                 
                <div id="address-form">
                    <?php if(!isset($_SESSION["idUsuario"]) || $_SESSION["userType"] == 0){ ?>

                        <div class="formGroup">
                        <label for="inputPhone">Telefone:</label>
                        <input type="text" id="inputPhone" name="inputPhone" placeholder="">
                    </div>

                    <div class="formGroup">
                        <label for="inputCreditCard">Nro. Cartão de Crédito:</label>
                        <input type="text" id="inputCreditCard" name="inputCreditCard" placeholder="">
                    </div>

                    <?php } ?>
                    <?php include_once "userAddressPartial.php"; ?>

                </div>

                

                <button class="corsBtn btn-purple" type="button" id="btn-create-user">Criar Usuário</button>

            </form>
        </div>
    </div>



</div>

<?php include_once "Layout/layoutFooter.php"; ?>