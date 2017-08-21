<?php 
include_once 'DAO/ProductDAO.php';
                        
?>


<html lang="nl">
    <head>
        <meta charset="utf-8">
        <title>Taak Advanced</title>
        <meta name="description" content=""/>
        <meta name="author" content="Bart Brusselmans" />
        <meta name="keywords" content=""/>
        
        <link href="style/style.css" rel="stylesheet" media="screen">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="Scripts/thumbnailviewer2.js"></script>
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
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
                            <li class="menu-item"><a href="detailpagina.php">detail</a></li>
                            <li class="menu-item"><a href="#">Voorbeeld</a></li>
                            <li class="menu-item"><a href="admin.php">Admin</a></li>
                            <li class="menu-item"><a href="index.php">Home</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            
            <div class="content-container">
                <?php
                    //include_once 'DAO/ProductDAO.php';
                    //Uittesten van functionaliteiten
                    //Omdat de methodes van PersoonDb allemaal static zijn, kan je de functionaliteiten gewoon gebruiken zonder dat je een instantie moet aanmaken.

                $productId = $_GET['productId'];
                $resultaat = ProductDAO::getProductById($productId);
                ?>
                
                <div class="path-container">
                    <ul class="path">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>/</li>
                        <li>
                            <a href="store.php">Store</a>
                        </li>
                        <li>/</li>
                        <li>
                            <a href="#"><?php echo $resultaat->getNaam(); ?></a>
                        </li>
                    </ul>
                </div>
                
                <div class="content">
                    <div class="product">
                        
                        <?php 
                        
                        
                        $serialized = serialize(array('Afbeelding_1'=>'Afbeeldingen/OLI.jpg', 'Afbeelding_2'=>'Afbeeldingen/OLI_D1.jpg', 'Afbeelding_3'=>'Afbeeldingen/OLI_D2.jpg'));

                        $foto = unserialize($resultaat->getLocatieFoto());

                        ?>
                        <div class="product-item">
                            <div class="product-top">
                                <div class="product-images">
                                    <div class="images">
                                        <div id="large" class="main-image">
                                            <img src="<?php echo $foto['Afbeelding_1']; ?>" id="largeImage">
                                        </div>
                                        <div class="thumbnails">
                                            <a>
                                                <img class='thumbnail' src="<?php echo $foto['Afbeelding_1']; ?>" onclick="changeImage('<?php echo $foto['Afbeelding_1']; ?>');">
                                            </a>
                                            <a>
                                                <img class="thumbnail" src="<?php echo $foto['Afbeelding_2']; ?>" onclick="changeImage('<?php echo $foto['Afbeelding_2']; ?>');">
                                            </a>
                                            <a>
                                                <img class="thumbnail" src="<?php echo $foto['Afbeelding_3']; ?>" onclick="changeImage('<?php echo $foto['Afbeelding_3']; ?>');">
                                            </a>
                                            <a>
                                                <img class="thumbnail" src="<?php echo $foto['Afbeelding_4']; ?>" onclick="changeImage('<?php echo $foto['Afbeelding_4']; ?>');">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="options-container">
                                        <div class="product-info">
                                            <h1 class="product-title">
                                                <?= $resultaat->getNaam() ?>
                                            </h1>
                                            <div class="product-price">
                                                <p class="item-price">
                                                    <span class="item-amount"> € <?= $resultaat->getPrijsInclBtw() ?></span><br>
                                                    <span class="item-amount-excl">excl. BTW € <?= number_format((float)$resultaat->getPrijsExclBtw(), 2, '.', ''); ?></span>
                                                </p>
                                            </div>
                                            <div class="description">
                                                <h2>Product Description</h2>
                                                <p>
                                                    <?= $resultaat->getBeschrijving() ?>
                                                </p>
                                            </div>
                                            <form action="voegToe.php" class="buttons" method="post">
                                                <div class="quantity">
                                                    <input type="number" step="1" min="1" name="quantity" value="1" class="input-text" id="spinner">
                                                    <input type="button" value="-" class="minus" id="min" onclick="updateSpinner(this);">
                                                    <input type="button" value="+" class="plus" id="plus" onclick="updateSpinner(this);">
                                                </div>
                                                <input type="hidden" name="add-to-cart" value="<?= $resultaat->getProductId()  ?>">
                                                
                                                <button type="submit" class="button-add">Add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="quote-container">
                <div class="quote">
                    <span>We stock products we believe in, which we use ourselves.</span>
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
                                    <a href="#">Voorbeeld</a>
                                </li>
                                <li class="cat-item">
                                    <a href="#">Voorbeeld</a>
                                </li>
                                <li class="cat-item">
                                    <a href="#">Voorbeeld</a>
                                </li>
                            </ul>
                        </li>
                        <li class="categories column">
                            <h2>LOGO</h2>
                        </li>
                    </ul>
                </div>
            </div>
        </div>     
    </body>
    
    <script src="Scripts/script.js"></script>
</html>

