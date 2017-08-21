<?php

function getVeldWaarde($naamVeld) {
    return $_POST[$naamVeld];
}

//Logische tests
function isVeldLeeg($naamVeld) {
    $waarde = getVeldWaarde($naamVeld);
    return empty($waarde);
}

function isVeldGroterDan($naamVeld, $waarde) {
    return (getVeldWaarde($naamVeld) > $waarde);
}

function isVeldKleinerDan ($naamVeld, $waarde){
    return (getVeldWaarde($naamVeld) <= $waarde);
}

function waardeGelijkAanGroterDan ($naamVeld, $waarde){
    return (getVeldWaarde($naamVeld) >= $waarde);
}

function waardeGelijkAanKleinerDan ($naamVeld, $waarde){
    return (getVeldWaarde($naamVeld) <= $waarde);
}

function waardeGelijkAan ($naamVeld, $waarde) {
    return (getVeldWaarde($naamVeld));
}

function isVeldNumeriek($naamVeld) {
    return is_numeric(getVeldWaarde($naamVeld));
}



//Error message generatie
function errRequiredVeld($naamVeld) {
    if (isVeldLeeg($naamVeld)) {
        return "Gelieve een waarde in te geven";
    } else {
        return "";
    }
}

function errVeldMoetGroterDanWaarde($naamVeld, $waarde) {
    if (isVeldGroterDan($naamVeld, $waarde)) {
        return "";
    } else {
        return "Waarde moet groter zijn dan " . $waarde . ".";
    }
}

function errVeldMoetKleinerDanWaarde ($naamVeld, $waarde){
    if (isVeldKleinerDan($naamVeld, $waarde)){
        return"";
    }else {
        return "Waarde moet kleiner zijn dan" . $waarde. ".";
    }
}

function errVeldMoetGelijkZijnAanWaardeGroterDan ($naamVeld, $waarde){
    if (waardeGelijkAanGroterDan($naamVeld, $waarde)){
        return"";
    }else{
        return "Waarde moet gelijk zijn aan 11";
    }
}

function errVeldMoetGelijkZijnAanWaardeKleinerDan ($naamVeld, $waarde){
    if (waardeGelijkAanKleinerDan($naamVeld, $waarde)){
        return"";
    }else{
        return "Waarde moet gelijk zijn aan 11";
    }
}

function errWaardeGelijkAan ($naamVeld, $waarde){

    $pattern = "^[0-9]{11}";
    $subject = $waarde;
    if (preg_match($pattern, $subject, $match)) {
  echo "Match was found <br />";
    }else {
    echo "geen waarde";  
  } 
}

function errVeldIsNumeriek($naamVeld) {
    if (isVeldNumeriek($naamVeld)) {
        return "";
    } else {
        return "Waarde moet numeriek zijn";
    }
}

function errVoegMeldingToe($huidigeErrMelding, $toeTeVoegenErrMelding) {
    if (empty($huidigeErrMelding)) {
        return $toeTeVoegenErrMelding;
    } else {
        if (empty($toeTeVoegenErrMelding)) {
            return $huidigeErrMelding;
        } else {
            return $huidigeErrMelding . "<br>" . $toeTeVoegenErrMelding;
        }
    }
}

?>

