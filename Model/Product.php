<?php

class Product {
    
    private $productId;
    private $naam;
    private $beschrijving;
    private $btwPercentage;
    private $prijsExclBtw;
    private $prijsInclBtw;
    private $categorie;
    private $locatieFoto;
    
    function __construct($productId, $naam, $beschrijving, $btwPercentage ,$prijsInclBtw, $categorie, $locatieFoto) {
        
        $this->productId = $productId;
        $this->naam = $naam;
        $this->beschrijving = $beschrijving;
        $this->btwPercentage = $btwPercentage;
        $this->prijsInclBtw = $prijsInclBtw;
        $this->prijsExclBtw = $prijsInclBtw - ($prijsInclBtw * $this->btwPercentage/100);
        $this->categorie = $categorie;
        $this->locatieFoto = $locatieFoto;
        
    }
    
    function setProductId($productId){
        $this->productId = $productId;
    }
    
    function setNaam($naam){
        $this->naam = $naam;
    }
    
    function setBeschrijving($beschrijving){
        $this->beschrijving = $beschrijving;
    }
    
    function setBtwPercentage($btwPercentage){
        $this->btwPercentage = $btwPercentage;
    }
    
    function setPrijsExclBtw($prijsExclBtw){
        $this->prijsExclBtw = $prijsExclBtw;
    }
    
    function setCategorie($categorie){
        $this->categorie = $categorie;
    }
    
    function setLocatieFoto($locatieFoto){
        $this->locatieFoto = $locatieFoto;
    }
    
    function getProductId(){
        return $this->productId;
    }
    
    function getNaam(){
        return $this->naam;
    }
    
    function getBeschrijving(){
        return $this->beschrijving;
    }
    
    function getBtwPercentage(){
        return $this->btwPercentage;
    }
    
    function getPrijsExclBtw(){
        return $this->prijsExclBtw;
    }
    
    function getLocatieFoto(){
        return $this->locatieFoto;
    }
    
    function getBtw(){
        $btw = $this->prijsInclBtw - $this->prijsExclBtw;
        return $btw;
    }
    
    function getPrijsInclBtw(){
        return $this->prijsInclBtw;
    }
    
    function getCategorie(){
        return $this->categorie;
    }
}

?>

