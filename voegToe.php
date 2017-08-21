<?php

include_once 'DAO/WinkelwagenDAO.php';
include_once 'Model/WinkelwagenItem.php';

WinkelwagenDAO::vermeerderAantalItems(new winkelwagenItem($_POST['quantity'], $_POST["add-to-cart"]));

header("location:detailpagina.php?productId=" . $_POST["add-to-cart"] );



?>