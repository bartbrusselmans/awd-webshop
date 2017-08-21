<?php
echo $_POST['remove-product'];
include_once 'DAO/ProductDAO.php';
include_once 'Model/Product.php';

echo $_POST['remove-product'];

$product = $_POST['remove-product'];

if (isset($product)) {
	return ProductDAO::deleteById($product);
}


header("location:admin.php");

?>
