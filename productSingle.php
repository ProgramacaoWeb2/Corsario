<?php
$page_title = "Pesquisa Detalhada";

include_once("Layout/layoutHeader.php");
include_once("DbFactory.php");

$id = @$_POST["idInput"];
$nome = @$_POST["nameInput"];

if ($id != "") {
    $productNew = $db->Produto()->getPorCodigo($id);
} else {
    $productNew = $db->Produto()->getPorNome($nome);
}


if ($productNew === NULL) {
    echo "Nenhum cadastro encontrado";
    return;
} else {
    $id = $productNew->getId();
    $name = $productNew->getNome();
    $description = $productNew->getDescricao();
}

?>


<table class="table">
    <thead class="thead-purple">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th>
        </tr>
    </thead>



    <tr>
        <td><?= $id ?></td>
        <td><?= $name ?></td>
        <td><?= $description ?></td>

        <td>


            <div class="btn-group float-right" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-purple dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="productEdit.php?id=<?= $id ?>"> Editar Produto</a>
                    <a class="dropdown-item btn-delete-user" href="productDelete.php?id=<?= $id ?>"> Deletar usuário</a>
                </div>
            </div>



        </td>


    </tr>

</table>