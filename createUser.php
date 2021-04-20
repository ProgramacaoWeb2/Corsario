
<?php
require "DbFactory.php";

$name = $_POST['inputName'];
$userName = $_POST['inputUsername'];
$password = $_POST['inputPassword'];
$comfirmPassword = $_POST['inputConfirmPassword'];


$newUser = new User(null, $userName, $password, $name);

$db->User()->Add($newUser);


header("Location: index.php");
exit;


?>