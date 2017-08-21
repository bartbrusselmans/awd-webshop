<?php
//In deze klasse moet je in principe alleen de connectiegegevens voor de mysql server aanpassen.
include_once 'DAO/Verbinding/Database.php';

class DatabaseFactory {

    //Singleton
    private static $verbinding;

    public static function getDatabase() {

        if (self::$verbinding == null) {
            $mijnComputernaam = "dtsl.ehb.be";
            $mijnGebruikersnaam = "15AWD027";
            $mijnWachtwoord = "36257148";
            $mijnDatabase = "15AWD027";
            self::$verbinding = new Database($mijnComputernaam, $mijnGebruikersnaam, $mijnWachtwoord, $mijnDatabase);
        }
        return self::$verbinding;
    }

}
?>

