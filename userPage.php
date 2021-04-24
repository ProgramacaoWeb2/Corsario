<?php 
include_once "Layout/layoutHeader.php";

require "DbFactory.php";

$userList = $db->Usuario()->getTodos();


if($userList) {
    
?>
  <div class="col-md-12 col-sm-12">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Login</th>
                <th>
            </tr>

            <?php foreach ($userList as $usuario) { ?>

            <tr>
                <td><?php echo $usuario->getId()?></td>
                <td><?php echo $usuario->getName()?></td>
                <td><?php echo $usuario->getLogin()?></td>

                <td class="float-right">
                    <button class="btn btn-danger" data-user="<?php echo $usuario->getId()?>"> Deletar</button>
                </td>
                

            </tr>

            <?php } ?>


        </table>
    </div>

<?php } else{ ?>

    <div class="col-md-12 col-sm-12 text-center">
        <span>Nenhum usuário localizado</span>
    </div>


<?php } ?>


<?php 
include_once "Layout/layoutFooter.php";

?>