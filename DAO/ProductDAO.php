<?php
include_once 'Model/Product.php';
include_once 'DAO/Verbinding/DatabaseFactory.php';

class ProductDAO {

    private static function getVerbinding() {
        return DatabaseFactory::getDatabase();
    }

    public static function getProducten() {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM product");
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }
    
    

    public static function getAllBynaam($naam) {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM product WHERE naam='?'", array($naam));
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }
    
    public static function getAllBycategorie($categorie) {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM product WHERE categorie='?'", array($categorie));
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }

    public static function getProductById($id) {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM product WHERE productId=?", array($id));
        if ($resultaat->num_rows == 1) {
            $databaseRij = $resultaat->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            //Er is waarschijnlijk iets mis gegaan
            return false;
        }
    }

    public static function voegProductToe($product) {
        return self::getVerbinding()->voerSqlQueryUit("INSERT INTO product(productId, naam, beschrijving, btwPercentage, prijsExclBtw, categorie, locatieFoto) VALUES (?,'?','?',?,?,'?','?')", array($product->getProductId() ,$product->getNaam(), $product->getBeschrijving(), $product->getBtwPercentage(), $product->getPrijsExclBtw(), $product->getCategorie() ,$product->getLocatieFoto()));
        
    }

    public static function deleteById($id) {
        return self::getVerbinding()->voerSqlQueryUit("DELETE FROM product where productId=?", array($id));
    }

    public static function verwijderProduct($product) {
        return self::deleteById($product->getProductId());
    }

    public static function updateProduct($product) {
        return self::getVerbinding()->voerSqlQueryUit("UPDATE product SET naam='?', beschrijving='?', btwPercentage='?', prijsInclBtw='?', locatieFoto='?' WHERE productId=?", array($product->getNaam(), $product->getBeschrijving(), $product->getBtwPercentage(),$product->getPrijsInclBtw(), $product->getLocatieFoto(),$product->getProductId()));
    }

    protected static function converteerRijNaarObject($databaseRij) {
        return new Product($databaseRij['productId'], $databaseRij['naam'], $databaseRij['beschrijving'], $databaseRij['btwPercentage'], $databaseRij['prijsInclBtw'], $databaseRij['categorie'], $databaseRij['locatieFoto']);
    }

}
