<?php
    session_start();
    include 'C:\xampp\htdocs\ROP\connect.php';
    $query_products = "SELECT * FROM products ORDER BY RAND() LIMIT 16";
    $random_products = mysqli_query($con, $query_products);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-shop</title>
    <link rel="stylesheet" href="/ROP/main_page/styles/header.css">
    <link rel="stylesheet" href="/ROP/main_page/styles/video.css">
    <link rel="stylesheet" href="/ROP/main_page/styles/carousel.css">
    <link rel="stylesheet" href="/ROP/main_page/styles/main.css">
    <link rel="stylesheet" href="/ROP/products_site/style/layout.css">
    <?php include 'C:\xampp\htdocs\ROP\links.html'?>
</head>
<body>
<?php include 'C:\xampp\htdocs\ROP\nav.php'?>
<div class="main">
    <div class="main-text">UNLEASH YOUR HIDDEN BEAST</div>
    <img src="/ROP/media/logo-ok.png" alt="">
    <div class="shade"></div>
</div>
    <div class="content">
    
        <div class="products">
    
                <?php foreach($random_products as $i => $product){?>          
                    <div class="card-container">
                        <div class="cart">
                            <a href="/ROP/products_site/product.php?id=<?php echo $product['id_product']?>">
                                <button class="button">
                                    <div class="button-pd">
                                    <p class="text">Otvoriť produkt</p>
                                </div>
                                </button>
                            </a>
                        </div>
                        
                        <div class="image<?php echo $count++?> image-content">
                            <img src="<?php echo "/ROP/admin_site/",$product['image']?>" alt="">
                        </div>
                        <div class="full-content">
                            <div class="top-content">
                                <h2 class="brand">
                                    <?php echo $product['brand']?>
                                </h2>
                                <h1 class="title">
                                <?php echo $product['title']?>
                                </h1>
                            </div>
                            <div class="paragraph">
                                <p class="text">
                                    <?php echo $product['caption']?>
                                </p>
                            </div>
                            <div class="amount">
                                <div class="correct-val">
                                    <p class="text">
                                        <?php echo number_format($product['price'],2,","," "), ' €'?>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php  }?>  
            </div>
    </div>
<?php include 'C:\xampp\htdocs\ROP\footer.html'?>
</body>
</html>
<script src="/ROP/main_page/js-file/script.js"></script>