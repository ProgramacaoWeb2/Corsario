<?php
$page_title = "Fornecedores";

include_once("Layout/layoutSimpleHeader.php");
include_once('DbFactory.php');

$supliers =  $db->Fornecedor()->getTodos();
?>


<body>




    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($supliers as $supplier) {
                    $id = $supplier->getId();
                    $name = $supplier->getNome();
                    $descricao = $supplier->getDescricao();
                    $phone = $supplier->getTelefone();
                    $mail = $supplier->getEmail();

                    echo "<tr>";
                    echo "<td> <a href='supplierEdit.php?id={$id}'>{$id}</a> </td> ";
                    echo "<td> <a href='supplierEdit.php?name={$name}'>{$name}</a> </td>";
                    echo "<td>$descricao</td>";
                    echo "<td>$phone</td>";
                    echo "<td>$mail</td>";
                    echo "<td><a href='supplierDelete.php?id={$id}'>  <button type=\"button\" class=\"btn btn-danger\">X</button>  </a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>