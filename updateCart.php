<?php

include_once 'DAO/WinkelwagenDAO.php';
include_once 'Model/WinkelwagenItem.php';


if (isset($_COOKIE["winkelwagenItem"])) {

    $serializedArray = $_COOKIE["winkelwagenItem"];
    $deserializedArray = unserialize($serializedArray);
    $winkelwagenItemGevonden = false;

    foreach ($deserializedArray as $huidigItem) {
        for ($i=0 ; $i < count($deserializedArray) ; $i++) { 

        
        if ($huidigItem->getProductId() == $deserializedArray[$i]->getProductId()) {
            $huidigAantal = $huidigItem->getAantal();
            $nieuwHuidigAantal = $_POST['quantity'];
            if ($nieuwHuidigAantal < $huidigAantal) {
                WinkelwagenDAO::verminderAantalItems(new WinkelwagenItem($_POST['quantity'], $_POST['ID']));
            } else {
                WinkelwagenDAO::vermeerderAantalItems(new WinkelwagenItem($_POST['quantity'], $_POST['ID']));  
                
            }
        }
    }
}
}

header("location:winkelwagenpagina.php");
?>