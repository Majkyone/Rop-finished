

    <nav class="navbar">
        <div class="logo"><img src="/ROP/media/logo-logo.png" alt=""></div>
        <a href="#" class="button">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="/ROP/main_page/home.php"><i class="fa fa-home" aria-hidden="true"></i> Domov</a></li>
                <li><a href="/ROP/products_site/products_site.php"><i class="fa fa-tags" aria-hidden="true"></i> Produkty</a></li>
                <li><a href="/ROP/products_site/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Košík 
                    <?php 
                    
                    if(isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                        echo "<span class='number'>", $count, '</span>';
                    }else{
                        echo "<span class='number'>", 0, '</span>';
                    }

                    ?>
                </a></li>
            </ul>
        </div>
    </nav>

