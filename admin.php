
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
        <script src="Scripts/script.js"></script>

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



            <div class="content-container">
                <div class="content" id="admin-content">
                    <div class="content-cart" id="content-admin">
                        <div class="cart-container" id="admin-container">
                            <div class="cart-title-container">
                                <h3 class="cart-title">Admin</h3>
                                <a href="toevoegenpagina.php" class="button-product" id="button">Product toevoegen ></a>
                            </div>

                            <div class="cart-content">

                                <table class="cart-table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="admin-product-remove"></th>
                                            <th class="admin-product-picture">Picture</th>
                                            <th class="admin-product-name">Product</th>
                                            <th class="admin-product-description">Description</th>
                                            <th class="admin-product-price">Price</th>    
                                            <th class="admin-product-btw">excl. BTW</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        include_once 'DAO/ProductDAO.php';
                                        foreach (ProductDAO::getProducten() as $product):
                                            $foto = unserialize($product->getLocatieFoto());
                                            ?>
                                            <tr class="admin-item">
                                        <form action="verwijderDbProduct.php" method="post">
                                            <td class="admin-item-remove">
                                                <input type="hidden" name="remove-product" value="<?php $product->getProductId(); ?>">
                                                <input type="submit" value="x" class="remove">
                                            </td>
                                        </form>
                                        <td class="admin-item-picture">
                                            <a href="detailpagina.php?productId=<?= $product->getProductId() ?>">
                                                <img src="<?php echo $foto['Afbeelding_1']; ?>">
                                            </a>
                                        </td>
                                        <td class="admin-item-name">
                                            <a href="detailpagina.php?productId=<?= $product->getProductId() ?>"><?= $product->getNaam() ?></a>
                                        </td>
                                        <td class="admin-item-description more">
                                            <p>
                                                <?= $product->getBeschrijving() ?>
                                            </p>
                                        </td>
                                        <td class="admin-item-price">
                                            <span class="amount">€ <?= $product->getPrijsInclBtw() ?></span>
                                        </td>
                                        <td class="admin-item-btw">
                                            <span class="amount">€ <?= number_format((float) $product->getPrijsExclBtw(), 2, '.', ''); ?></span>
                                        </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
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

