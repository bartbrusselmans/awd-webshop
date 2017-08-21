<?php
$naamVal = $beschrijvingVal = $prijsVal = $btwVal = $categorieVal = $fotoVal = "";
$naamErr = $beschrijvingErr = $prijsErr = $btwErr = $categorieErr = $fotoErr = "";
$str = "";
$toonFormulier = true;

include_once 'validation.php';
include_once 'DAO/ProductDAO.php';

if (isFormulierIngediend()) {
    $naamErr = errRequiredVeld("naam");
    $beschrijvingErr = errRequiredVeld("beschrijving");
    
    $prijsErr = errVoegMeldingToe(errRequiredVeld("prijs"), errVeldIsNumeriek("prijs"));
    $prijsErr = errVoegMeldingToe($prijsErr, errVeldMoetGroterDanWaarde("prijs", 0));
    
    $categorieErr = errRequiredVeld("categorie");
    
    
    if (isFormulierValid()) {
        $toonFormulier = false;
        
        
        
        
        
        ?>

        <!DOCTYPE html>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title></title>
            </head>
            
            <body>
                <div>
                    De ingevulde naam is:
                </div>
                <div>
                    <?php
                    //We kunnen de POST variabelen gewoon uitlezen en weergeven
                    echo $_POST["naam"];
                    ?>
                </div>
                <div>
                    De ingevulde beschrijving is:
                </div>
                <div>
                    <?php
                    //We kunnen de POST variabelen gewoon uitlezen en weergeven
                    echo $_POST["beschrijving"];
                    ?>
                </div>
                <div>
                    De ingevulde prijs is:
                </div>
                <div>
                    <?php
                    //We kunnen de POST variabelen gewoon uitlezen en weergeven
                    echo $_POST["prijs"];
                    ?>
                </div>
                <div>
                    De ingevulde categorie is:
                </div>
                <div>
                    <?php
                    //We kunnen de POST variabelen gewoon uitlezen en weergeven
                    echo $_POST["categorie"];
                    ?>
                </div>
                <div>
                    De ingevulde btw is:
                </div>
                <div>
                    <?php
                    if (empty($_POST["btw"])){
                        $_POST["btw"] = 21;
                    }
                    //We kunnen de POST variabelen gewoon uitlezen en weergeven
                    echo $_POST["btw"];
                    ?>
                </div>
                <div>
                    De ingevulde foto is:
                </div>
                <div>
                    <?php
                    
                    
                    ?><br><br><br><?php
                    
                    
                    if (isset($_FILES['foto'])) {
                        $name_array = $_FILES['foto']['name'];
                        $tmp_name_array = $_FILES['foto']['tmp_name'];
                        $type_array = $_FILES['foto']['type'];
                        $size_array = $_FILES['foto']['size'];
                        $error_array = $_FILES['foto']['error'];
                        
                        
                        
                        
                        echo $type_array[0].'<br>';
                        echo $type_array[1].'<br>';
                        echo $type_array[2].'<br>';
                        echo $type_array[3].'<br>';

                            for ($i = 0; $i < count($tmp_name_array); $i++) {
                                if ($size_array[$i] > 2097152) {
                                    echo "File is too large. Max 2MB<br>";
                                }
                                
                                if ($type_array[$i] != "image/jpeg" && $type_array[$i] != "image/jpg" && $type_array[$i] != "image/png" && $type_array[$i] != "image/gif") {
                                    echo 'Only jpeg, jpg, png or gif are permitted.<br>';
                                }
                                
                                else {
                                    if (move_uploaded_file($tmp_name_array[$i], "Afbeeldingen/".$name_array[$i])){
                                        echo $name_array[$i]." upload complete<br>";
                                    } else {
                                        echo "move_upload_file function failed for " . $name_array[$i]. "<br>";
                                    }
                                }
                            }
                        }
                        
                        
                        $str = serialize($name_array);
                        echo $str . '<br>';
                        
                        
                        $naam = $_POST['naam'];
                        $beschrijving = $_POST['beschrijving'];
                        $btw = $_POST['btw'];
                        $prijs = $_POST['prijs'];
                        $categorie = $_POST['categorie'];
                        
                        ProductDAO::voegProductToe(new Product(0, $naam, $beschrijving, $btw, $prijs, $categorie, $str ));
                        
                        
                    
                    ?>
                    <?php for ($j = 0; $j < count($name_array); $j++){ ?>
                    <img src="Afbeeldingen/<?= $name_array[$j] ?>"> <?php } ?>
                </div>
            </body>
        </html>
        <?php
    } else {
        $naamVal = getVeldWaarde("naam");
        $beschrijvingVal = getVeldWaarde("beschrijving");
        $prijsVal = getVeldWaarde("prijs");
        $btwVal = getVeldWaarde("btw");
        $categorieVal = getVeldWaarde("categorie");
        $fotoVal = getVeldWaarde("foto");
    }
}

function isFormulierValid() {
    global $naamErr, $beschrijvingErr, $prijsErr, $btwErr, $categorieErr;
    $allErr = $naamErr . $beschrijvingErr . $prijsErr . $btwErr . $categorieErr;
    if (empty($allErr)) {
        return true;
    } else {
        return false;
    }
}

function isFormulierIngediend() {
    return isset($_POST["postcheck"]);
}

if ($toonFormulier) {
    ?>
    <!DOCTYPE html>
    <html lang="nl">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link href="style/style.css" rel="stylesheet" media="screen">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        </head>
    <body>
        <body>
        <div id="wrapper">
            <div class="header-container">
                <nav class="header">
                    <div class="logo">
                        <h1>
                            <a href="index.php">
                                <img src="Afbeeldingen/star-text.png">
                            </a>
                        </h1>
                    </div>
                    <div class="cart">
                        <a href="winkelwagenpagina.php" class="cart-button">
                            <img width="50" height="55" src="Afbeeldingen/593.png">
                        </a>
                    </div>
                    <div class="menu-container">
                        <ul class="menu">
                            <li class="menu-item"><a href="store.php">Store</a></li>
                            <li class="menu-item"><a href="winkelwagenpagina.php">Cart</a></li>
                            <li class="menu-item"><a href="admin.php">Admin</a></li>
                            <li class="menu-item"><a href="index.php">Home</a></li>
                        </ul>
                    </div>
                </nav>
            </div>


            <div class="content-container">
                <div class="content">
                <div class="cart-container">
                    <form action="toevoegenpagina.php" method="POST" enctype="multipart/form-data">
                    <label for="naam">Naam:</label><br>
            <input type="text" name="naam" value="<?php echo $naamVal; ?>"/><br>
            <mark><?php echo $naamErr; ?></mark>
            <br>
            <label for="beschrijving">Beschrijving:</label><br>
            <input type="text" name="beschrijving" value="<?php echo $beschrijvingVal; ?>"/><br>
            <mark><?php echo $beschrijvingErr; ?></mark>
            <br>
            <label for="prijs">prijs:</label><br>
            <input type="text" name="prijs" value="<?php echo $prijsVal; ?>"/><br>
            <mark><?php echo $prijsErr; ?></mark>
            <br>
            <label for="btw">BTW:</label><br>
            <input type="text" name="btw" value="<?php echo $btwVal; ?>"/><br>
            <mark><?php echo $btwErr; ?></mark>
            <br>
            <label for="categorie">Categorie:</label><br>
            <select name="categorie">
                <option value="jackets">jackets</option>
                <option value="shoes">shoes</option>
                <option value="tents">tents</option>
                <option value="tents">accessories</option>
            </select><br>
            <mark><?php echo $categorieErr; ;?></mark>
            <br>
            <label for="foto">Uploaden:<br>
                <input type="file" name="foto[]"/><br>
                <input type="file" name="foto[]"/><br>
                <input type="file" name="foto[]"/><br>
                <input type="file" name="foto[]"/><br>
            </label><br>
            <mark> <?php echo $fotoErr; ?></mark>
            
            <br>
            <br>
            <div>
                
                Druk op de knop:
                <input type="hidden" name="postcheck" value="true"/>
                <input type="submit" value="Verstuur">
            </div>
                    </form>
                    </div>
                </div>
            </div>


            <div class="quote-container">
                <div class="quote">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    <a class="browse" href="store.php">Browse our store</a> 
                </div>
            </div>
            
            <div class="footer-container">
                <div class="footer">
                    <ul class="sitemap two_column">
                        <li class="categories column">
                            <h4 class="categories-title">Categories</h4>
                            <ul>
                                <li class="cat-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="cat-item">
                                    <a href="admin.php">Admin</a>
                                </li>
                                <li class="cat-item">
                                    <a href="winkelwagenpagina.php">Cart</a>
                                </li>
                                <li class="cat-item">
                                    <a href="store.php">Store</a>
                                </li>
                            </ul>
                        </li>
                        <li class="categories column">
                            <a href="index.php">
                                <img src="Afbeeldingen/star-text.png">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>



        </div>

    </body>
    </html>
<?php
}

?>

