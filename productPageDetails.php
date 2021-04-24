<?php
$page_title = "Produtos";

include_once("Layout/layoutSimpleHeader.php");
include_once('DbFactory.php');

$products =  $db->Produto()->getTodos();
?>


<body>




    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) {
                    $id = $product->getId();
                    $name = $product->getNome();
                    $description = $product->getDescricao();
                
                    echo "<tr>";
                    echo "<td> <a href='productEdit.php?id={$id}'>{$id}</a> </td> ";
                    echo "<td> <a href='productEdit.php?name={$name}'>{$name}</a> </td>";
                    echo "<td>$description</td>";
                    echo "<td><a href='productDelete.php?id={$id}'>  <button type=\"button\" class=\"btn btn-danger\">X</button>  </a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>