<?php
include_once 'DAO/ProductDAO.php';
include_once 'DAO/WinkelwagenDAO.php';
include_once 'Ingenico.php';
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
                            <li class="menu-item"><a href="store.php">Store</a></li>
                            <li class="menu-item"><a href="winkelwagenpagina.php">Cart</a></li>
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
                //$product = ProductDAO::getProductById(1);
                //  echo $product->getNaam();
                ?>

                <div class="content">
                    <div class="content-cart">
                        <div class="cart-container">
                            <div class="cart-title-container">
                                <h3 class="cart-title">Cart</h3>
                            </div>
                            
                            <div class="cart-content">
                                
                                    <table class="cart-table" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-remove"></th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-price">Price</th>
                                                <th class="cart-product-quantity">Quantity</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            $cookieArray = WinkelwagenDAO::getWinkelwagenItems();
                                             
                                            foreach ($cookieArray as $value) {
                                                $winkelProduct = $value->getProduct();
                                                ?>
                                                <tr class="cart-item">
                                                <form action="verwijderCartItem.php" method="post" id="form_remove">
                                                    <td class="cart-item-remove">
                                                        <input type="hidden" value="<?php echo $value->getProductId(); ?>" name="remove">
                                                        <button type="submit" form="form_remove"  value="x" class="remove" >x</button>
                                                    </td>
                                                    </form>
                                                    <form action="updateCart.php" method="post" id="form_update">
                                                    <td class="cart-item-name">
                                                        <a href="detailpagina.php"><?php echo $winkelProduct->getNaam(); ?> </a>
                                                    </td>
                                                    <td class="cart-item-price">
                                                        <span class="amount"><?php echo $winkelProduct->getPrijsInclBtw(); ?></span>
                                                    </td>
                                                    <td class="cart-item-quantity">
                                                        <div class="quantity">
                                                            <input type="number" step="1" min="1" name="quantity" value="<?php echo $value->getAantal(); ?>" class="input-text" id="spinner">
                                                            <input type="button" value="-" class="minus" id="min" onclick="updateSpinner(this);">
                                                            <input type="button" value="+" class="plus" id="plus" onclick="updateSpinner(this);">
                                                            <input type="hidden" name="ID" value="<?php echo $value->getProductId(); ?>">
                                                        </div>
                                                    </td>
                                                    <td class="cart-item-subtotal">
                                                        <span class="amount">€ <?php echo number_format((float)$value->getTotaalPrijsInclBtw(), 2, '.', ''); ?></span>
                                                    </td>
                                                    </form>
                                                </tr>
                                                    <?php } ?>

                                        </tbody>
                                    </table>
                                
                            </div>

                            <div class="cart-totals">
                                <table class="subtotals" cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>
                                                <strong>Cart Subtotal</strong>
                                            </th>
                                            <td>
                                                <strong>
                                                    <span class="amount">€ <?php echo number_format((float)  WinkelwagenDAO::getTotaalPrijsExclBtw(), 2, '.', ''); ?></span>
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr class="btw">
                                            <th>
                                                <strong>BTW</strong>
                                            </th>
                                            <td>
                                                <strong>
                                                    <span class="amount">€ <?php echo number_format((float) WinkelwagenDAO::getTotaalBtw(), 2, '.', ''); ?></span>
                                                </strong>
                                            </td>
                                        </tr>
                                        
                                        <tr class="cart-total">
                                            <th>
                                                <strong>Cart Total</strong>
                                            </th>
                                            <td>
                                                <strong>
                                                    <span class="amount">€ <?php echo number_format((float) WinkelwagenDAO::getTotaalPrijsInclBtw(), 2, '.', ''); ?></span>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            

                            <div class="checkout">
                                <table>
                                    <tr>
                                        <td colspan="6" class="actions">

                                            <form action="https://secure.ogone.com/ncol/test/orderstandard.asp" method="post">
                                            <?php
                                            $bedrag = number_format((float) WinkelwagenDAO::getTotaalPrijsInclBtw(), 2, '.', '');
                                            $bedragInCentiemen = $bedrag * 100;
                                            $mijnBetaling = Ingenico::genereerNieuweBetaling($bedragInCentiemen);
                                            //Eventueel kan je hier nog eigenschappen van de betaling aanpassen        
                                            //$mijnBetaling->setKlantEmail("emailadres");
                                            $mijnBetaling->genereerBetalingsformulier();
        
                                            ?>
                                            
                                            </form>

                                            
                                            <button type="submit" form="form_update" class="button-add" name="update-cart" value="Update Cart">Update Cart</button>
                                            
                                            
                                            
                                            
                                            
                                        </td>
                                    </tr>
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

    <script src="Scripts/script.js"></script>
</html>

