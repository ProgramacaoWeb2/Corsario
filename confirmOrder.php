

<?php

    $listaProdutos = json_decode($_SESSION["SessionCart"]); // [ {idProduto: 1, qtd: 2}, {idProduto: 3, qtd: 1}]
    $idUsuario = $_SESSION["idUsuario"];

    $cu = 0;


?>