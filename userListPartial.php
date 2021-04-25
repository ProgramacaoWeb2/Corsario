<?php 

require "DbFactory.php";

$search = @$_POST["search"];

if(isset($search))
    $userList = $db->Usuario()->getTodos($search);
else
    $userList = $db->Usuario()->getTodos();


if($userList) {
    
?>
    

        <table class="table">
            <thead class="thead-purple">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>
                </tr>
            </thead>

            <?php foreach ($userList as $usuario) { ?>

            <tr>
                <td><?php echo $usuario->getId()?></td>
                <td><?php echo $usuario->getName()?></td>
                <td><?php echo $usuario->getLogin()?></td>

                <td>
                    

                    <div class="btn-group float-right" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-purple dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opções
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="editUserPage.php?idUsuario=<?php echo $usuario->getId()?>"> Editar usuário</a>
                            <a class="dropdown-item" href="changePasswordPage.php?idUsuario=<?php echo $usuario->getId()?>"> Alterar senha</a>
                            <a class="dropdown-item btn-delete-user" href="#" data-user="<?php echo $usuario->getId()?>"> Deletar usuário</a>
                        </div>
                    </div>


           
                </td>
                

            </tr>

            <?php } ?>


        </table>

<?php } else{ ?>

    <div class="col-md-12 col-sm-12 text-center">
        <span>Nenhum usuário localizado</span>
    </div>


<?php } ?>


