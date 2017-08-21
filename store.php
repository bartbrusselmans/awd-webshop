
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
        </div>
        
        <div class="search-box">
            <h4>Categories:</h4>
            <form action="store.php" method="">
                <input type="checkbox" name="jackets" value="jackets">Jackets<br>
                <input type="checkbox" name="shoes" value="shoes">Shoes<br>
                <input type="checkbox" name="tents" value="tents">Tents<br>
                <input type="checkbox" name="tents" value="tents">Accessories<br>
            </form>
        </div>
        
        <div class="content-container">
            <div class="store-wrapper" id="general-store">
                    <ul class="store_1">
                        <li class="store-content-container">
                            <h3 class="store_1-title">Store</h3>
                            <ul class="content-store_1 four_column">
                            <?php include_once 'DAO/ProductDAO.php';
                                foreach (ProductDAO::getProducten() as $product): 
                                    $foto = unserialize($product->getLocatieFoto());?>
                                <form action="">
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
                                                <button type="submit" value="buy" class="button-product" id="button">Buy</button>
                                            </li>
                                </form>
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




    
 </html>