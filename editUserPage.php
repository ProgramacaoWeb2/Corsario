
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


                <?php if(isset($_SESSION["idUsuario"]) && $_SESSION["userType"] == 1){ ?>

                    <div class="formGroup">
                            <label for="inputTypeUser">Tipo Usuário:</label>
                            
                            <select name="inputTypeUser" id="inputTypeUser" class="form-control">

                            <?php if($User->getUserType() == 0){ ?>  
                                    <option value="0" selected>Cliente</option><?php 
                            } else { ?>
                                    <option value="0">Cliente</option>
                            <?php } ?>

                            <?php if($User->getUserType() == 1){ ?>  
                                    <option value="1" selected>Interno</option>
                            <?php } else { ?>
                                    <option value="1">Interno</option>
                            <?php } ?>

                            </select>

                    </div>
                <?php }?>

                <div id="address-form">

                    <div class="formGroup">
                        <label for="inputPhone">Telefone:</label>
                        <input type="text" id="inputPhone" name="inputPhone" placeholder="" value="<?php echo($User->getTelefone())?>">
                    </div>

                    <div class="formGroup">
                        <label for="inputCreditCard">Nro. Cartão de Crédito:</label>
                        <input type="text" id="inputCreditCard" name="inputCreditCard" placeholder="" value="<?php echo($User->getCartaoCredito())?>">
                    </div>
                    
                    
                    <?php 
                    
                        if($User->getEndereco() != null)
                            $idEndereco = $User->getEndereco();

                        include_once "userAddressPartial.php";
                    
                    ?>

                </div>

               










                <button class="corsBtn btn-purple" type="button" id="btn-edit-user">Salvar</button>

            </form>
        </div>
    </div>



</div>

<?php include_once "Layout/layoutFooter.php"; ?>