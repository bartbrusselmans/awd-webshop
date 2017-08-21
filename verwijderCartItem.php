<?php

include_once 'DAO/WinkelwagenDAO.php';
include_once 'Model/WinkelwagenItem.php';
echo $_POST['remove'];
WinkelwagenDAO::verwijderProduct($_POST['remove']);

header("location:winkelwagenpagina.php");

?>

