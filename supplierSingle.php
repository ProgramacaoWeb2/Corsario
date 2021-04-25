<?php
$page_title = "Pesquisa Detalhada";

include_once("Layout/layoutHeader.php");
include_once('DbFactory.php');

$supliers =  $db->Fornecedor()->getTodos();



$id = @$_POST["idInput"];
$nome = @$_POST["nameInput"];

if ($id != "") {
    $supplierNew = $db->Fornecedor()->getPorCodigo($id);
} else {
    $supplierNew = $db->Fornecedor()->getPorNome($nome);
}


if ($supplierNew === NULL) {
    echo "Nenhum cadastro encontrado";
    return;
} else {
    $id = $supplierNew->getId();
    $name = $supplierNew->getNome();
    $description = $supplierNew->getDescricao();
    $phone = $supplierNew->getTelefone();
    $email = $supplierNew->getEmail();
}

?>


<table class="table">
    <thead class="thead-purple">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Telefone</th>
            <th scope="col">E-mail</th>
            <th>
        </tr>
    </thead>



    <tr>
        <td><?= $id ?></td>
        <td><?= $name ?></td>
        <td><?= $description ?></td>
        <td><?= $phone ?></td>
        <td><?= $email ?></td>

        <td>


            <div class="btn-group float-right" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-purple dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="supplierEdit.php?id=<?= $id ?>"> Editar Fornecedor</a>
                    <a class="dropdown-item btn-delete-user" href="supplierDelete.php?id=<?= $id ?>"> Deletar Fornecedor</a>
                </div>
            </div>



        </td>


    </tr>

</table>