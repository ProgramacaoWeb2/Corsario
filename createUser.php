<?php
require "DbFactory.php";

$name = $_POST['inputName'];
$userName = $_POST['inputUsername'];
$password = $_POST['inputPassword'];
$comfirmPassword = $_POST['inputConfirmPassword'];



$newUser = new Usuario(null, $userName, $password, $name);

$db->Usuario()->insere($newUser);


header("Location: index.php");
exit();
?>