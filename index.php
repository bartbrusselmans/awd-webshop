<!doctype html>
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
                            <li class="menu-item"><a href="store.php">Store</a></li>
                            <li class="menu-item"><a href="winkelwagenpagina.php">Cart</a></li>
                            <li class="menu-item"><a href="admin.php">Admin</a></li>
                            <li class="menu-item"><a href="index.php">Home</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            
            <!--Photo Mid-Page-->
            <div id="banner-container">
                <div id="banner">
                    <img src="Afbeeldingen/Banner_special.jpg">
                </div>
            </div>
            
            
            <div class="content-container">
                
                <!--Slide Banner-->
                <div id="slidy-container">
                    <figure id="slidy">
                        <img src="Afbeeldingen/Slidy_01.jpg" alt="">
                        <img src="Afbeeldingen/Slidy_02.jpg" alt="">
                        <img src="Afbeeldingen/Slidy_03.jpg" alt="">
                        <img src="Afbeeldingen/Slidy_04.jpg" alt="">
                    </figure>
                </div>
                
             
                <!-- Store List -->
                <div class="store-wrapper">
                    <ul class="store_1">
                        <li class="store-content-container">
                            <h3 class="store_1-title">Jackets</h3>
                            <ul class="content-store_1 four_column">
                            <?php include_once 'DAO/ProductDAO.php';
                                foreach (ProductDAO::getAllBycategorie("jackets") as $product): 
                                    $foto = unserialize($product->getLocatieFoto());?>
                                
                                    <li class="column">
                                                <div class="content-store-image">
                                                    <a href="detailpagina.php?productId=<?php echo $product->getProductId()?>">
                                                        <img width="660" height="495" src="<?php echo $foto['Afbeelding_1']; ?>">
                                                    </a>
                                                </div>
                                                <div class="content-store-text">
                                                    <h4 class="content-title">
                                                        <a href="detailpagina.php?productId=<?php echo $product->getProductId()?>"><?= $product->getNaam() ?></a>
                                                    </h4>
                                                </div>
                                                <span class="price">
                                                    <span class="amount"> € <?php echo $product->getPrijsInclBtw() ?></span>
                                                </span>
                                                <a href="detailpagina.php?productId=<?php echo $product->getProductId(); ?>" class="button-product" id="button">Buy</a>
                                            </li>
                                
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                
                
                <div class="store-wrapper" id="store_2">
                    <ul class="store_1">
                        <li class="store-content-container">
                            <h3 class="store_1-title">Shoes</h3>
                            <ul class="content-store_1 three_column">
                                
                                <?php 
                                foreach (ProductDAO::getAllBycategorie("shoes") as $product): 
                                    $foto = unserialize($product->getLocatieFoto());?>
                                
                                    <li class="column">
                                                <div class="content-store-image">
                                                    <a href="detailpagina.php?productId=<?= $product->getProductId()?>">
                                                        <img width="660" height="495" src="<?php echo $foto['Afbeelding_1']; ?>">
                                                    </a>
                                                </div>
                                                <div class="content-store-text">
                                                    <h4 class="content-title">
                                                        <a href="detailpagina.php?productId=<?= $product->getProductId()?>"><?= $product->getNaam() ?></a>
                                                    </h4>
                                                </div>
                                                <span class="price">
                                                    <span class="amount"> € <?=$product->getPrijsInclBtw() ?></span>
                                                </span>
                                                <a href="detailpagina.php?productId=<?php echo $product->getProductId(); ?>" class="button-product" id="button">Buy</a>
                                            </li>
                                
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <div class="special-container">
                    <div id="special">
                        <h2 class="title">
                            <a href="#" >Lorem Ipsum</a>
                        </h2>
                        <h5>Lorem ipsum dolor sit amet.</h5>
                        <div class="tekst">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper scelerisque nibh, at ornare libero ullamcorper eu. Nulla mattis sit.
                            </p>
                            <p>
                                <a class="button_special" href="#" >Lorem Ipsum sit amet</a>
                                <a class="button_special" href="#" >Lorem Ipsum sit amet</a>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="store-wrapper" id="store_3">
                    <ul class="store_1">
                        <li class="store-content-container">
                            <h3 class="store_1-title">Tents</h3>
                            <ul class="content-store_1 three_column">
                                <?php 
                                foreach (ProductDAO::getAllBycategorie("tents") as $product): 
                                    $foto = unserialize($product->getLocatieFoto());?>
                                
                                    <li class="column">
                                                <div class="content-store-image">
                                                    <a href="detailpagina.php?productId=<?= $product->getProductId()?>">
                                                        <img width="660" height="495" src="<?php echo $foto['Afbeelding_1']; ?>">
                                                    </a>
                                                </div>
                                                <div class="content-store-text">
                                                    <h4 class="content-title">
                                                        <a href="detailpagina.php?productId=<?= $product->getProductId()?>"><?= $product->getNaam() ?></a>
                                                    </h4>
                                                </div>
                                                <span class="price">
                                                    <span class="amount"> € <?=$product->getPrijsInclBtw() ?></span>
                                                </span>
                                                <a href="detailpagina.php?productId=<?php echo $product->getProductId(); ?>" class="button-product" id="button">Buy</a>
                                            </li>
                                
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <div class="store-wrapper" id="store_4">
                    <ul class="store_1">
                        <li class="store-content-container">
                            <h3 class="store_1-title">Accessories</h3>
                            <ul class="content-store_1 four_column">
                                <?php 
                                foreach (ProductDAO::getAllBycategorie("accessories") as $product): 
                                    $foto = unserialize($product->getLocatieFoto());?>
                                
                                    <li class="column">
                                                <div class="content-store-image">
                                                    <a href="detailpagina.php?productId=<?= $product->getProductId()?>">
                                                        <img width="660" height="495" src="<?php echo $foto['Afbeelding_1']; ?>">
                                                    </a>
                                                </div>
                                                <div class="content-store-text">
                                                    <h4 class="content-title">
                                                        <a href="detailpagina.php?productId=<?= $product->getProductId()?>"><?= $product->getNaam() ?></a>
                                                    </h4>
                                                </div>
                                                <span class="price">
                                                    <span class="amount"> € <?=$product->getPrijsInclBtw() ?></span>
                                                </span>
                                                <a href="detailpagina.php?productId=<?php echo $product->getProductId(); ?>" class="button-product" id="button">Buy</a>
                                            </li>
                                
                                <?php endforeach; ?>
                                
                                
                                
                                
                            </ul>
                        </li>
                    </ul>
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
    
    <script src="Scripts/cssslidy.js"></script>
    <script src="Scripts/script.js"></script>
    <script>cssSlidy();</script>

</html>