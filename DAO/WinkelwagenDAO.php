<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'Model/WinkelwagenItem.php';
//include_once 'DAO/Verbinding/DatabaseFactory.php';

class WinkelwagenDAO {

    public static function getWinkelwagenItems() {

        if (isset($_COOKIE['winkelwagenItem'])) {
            
            $winkelwagen = unserialize($_COOKIE["winkelwagenItem"]);
            return $winkelwagen;
        } else {
            return array();
        }
    }

    public static function vermeerderAantalItems($winkelwagenitem) {

        if (isset($_COOKIE["winkelwagenItem"])) {
            

            $serializedArray = $_COOKIE["winkelwagenItem"];
            $deserializedArray = unserialize($serializedArray);
            $winkelwagenItemGevonden = false;

            foreach ($deserializedArray as $huidigItem) {
                if ($huidigItem->getProductId() == $winkelwagenitem->getProductId()) {

                    $nieuwHuidigAantal += $winkelwagenitem->getAantal();
                    $huidigItem->setAantal($nieuwHuidigAantal);
                    $nieuwCookie = serialize($deserializedArray);
                    setcookie("winkelwagenItem", $nieuwCookie);
                    $winkelwagenItemGevonden = true;
                }
            }

            if ($winkelwagenItemGevonden != true) {
                $nieuwItem = new WinkelwagenItem($winkelwagenitem->getAantal(), $winkelwagenitem->getProductId());
                array_push($deserializedArray, $nieuwItem);

                $nieuwGeserialiseerdItem = serialize($deserializedArray);

                setcookie("winkelwagenItem", $nieuwGeserialiseerdItem);
            }
        } else {
            $mijnWinkelWagenItem = new WinkelwagenItem($winkelwagenitem->getAantal(), $winkelwagenitem->getProductId());
            $mijnArray =  array($mijnWinkelWagenItem);
            
            $geserialiseerd = serialize($mijnArray);
            echo $geserialiseerd;
            setcookie("winkelwagenItem", $geserialiseerd);
        }
    }

    public static function verminderAantalItems($winkelwagenitem) {
        if (isset($_COOKIE["winkelwagenItem"])) {
            $serializedArray = $_COOKIE["winkelwagenItem"];
            $deserializedArray = unserialize($serializedArray);
            $winkelwagenItemGevonden = false;

            foreach ($deserializedArray as $huidigItem) {
                if ($huidigItem->getProductId() == $winkelwagenitem->getProductId()) {
                    $nieuwHuidigAantal = $winkelwagenitem->getAantal();
                    $nieuwHuidigAantal -= $winkelwagenitem->getAantal();


                    
                        $huidigItem->setAantal($nieuwHuidigAantal);
                        $nieuwCookie = serialize($deserializedArray);
                        setcookie("winkelwagenItem", $deserializedArray);
                        $winkelwagenItemGevonden = true;
                    
                }
            }

            if ($winkelwagenItemGevonden != true) {
                //$nieuwItem = new WinkelwagenItem($winkelwagenitem->getAantal(), $winkelwagenitem->getProductId());
                //$nieuwGeserialiseerdItem = serialize(array_pop($array));
                //setcookie("winkelwagenItem", $nieuwGeserialiseerdItem);
            }
        }
    }

    public static function verwijderProduct($productId) {
        if (isset($_COOKIE["winkelwagenItem"])) {
            $serializedArray = $_COOKIE["winkelwagenItem"];
            $deserializedArray = unserialize($serializedArray);
            $winkelwagenItemGevonden = false;

            foreach ($deserializedArray as $huidigItem) {
                
                if ($huidigItem->getProductId() == $productId) {
                    $huidigItem->getProductId();
                    $deserializedArray = array_slice($deserializedArray, $huidigItem->getProductId());

                }
            }
            $geserialiseerd = serialize($deserializedArray);
            setcookie("winkelwagenItem", $geserialiseerd);
        }
    }

    public static function getTotaalPrijsExclBtw() {
            $TotaalPrijsExclBtw = 0;

            foreach (self::getWinkelwagenItems() as $huidigItem) {
                    $TotaalPrijsExclBtw += $huidigItem->getTotaalPrijsExclBtw();
            }
            return $TotaalPrijsExclBtw;
        
    }

    public static function getTotaalBtw() {
        $TotaalBtw = 0;

            foreach (self::getWinkelwagenItems() as $huidigItem) {
                    $TotaalBtw += $huidigItem->getTotaalBtw();
            }
            return $TotaalBtw;
    }

    public static function getTotaalPrijsInclBtw() {
        $TotaalPrijsInclBtw = 0;

            foreach (self::getWinkelwagenItems() as $huidigItem) {
                    $TotaalPrijsInclBtw += $huidigItem->getTotaalPrijsInclBtw();
            }
            return $TotaalPrijsInclBtw;
    }
}?>


