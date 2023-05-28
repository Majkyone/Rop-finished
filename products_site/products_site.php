<?php 
    include 'C:\xampp\htdocs\ROP\connect.php';
    session_start();
    $max_price = "SELECT MAX(price) FROM products";
    $min_price ="SELECT MIN(price) FROM products";
    $max = mysqli_query($con, $max_price);
    $min = mysqli_query($con, $min_price);
    foreach($max as $i){
        $max_value = implode("",$i);
    }
    foreach($min as $i){
        $min_value = implode("",$i);
    }

    $search = $_GET['search'] ?? '';
    $category = $_GET['category'] ?? '';
    $price = $_GET['price'] ?? $max_value;
    $brand = $_GET['brand'] ?? '';
    $type = $_GET['type'] ?? '';
    $price = $price + 0.001;

    if($category == 'all'){
        $category = null;
    }
    if($brand == 'all'){
        $brand = null;
    }
    if($type == 'all'){
        $type = null;
    }
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        if($page < 1){
            $page = 1;
        }
    }else{
        $page = 1;
    }

    $start_from = ($page-1) * 24;
    $number_per_page = 24;

    $query_products = "SELECT * FROM products WHERE quantity >= 0 AND title LIKE '%$search%'AND category LIKE '%$category%' AND brand LIKE '%$brand%' AND type LIKE '%$type%' AND price <= '$price' ORDER BY title LIMIT $start_from, $number_per_page";
    $page_query = "SELECT * FROM products WHERE quantity >= 0 AND title LIKE '%$search%' AND category LIKE '%$category%' AND brand LIKE '%$brand%' AND type LIKE '%$type%' AND price <= '$price' ORDER BY title";
  
    
    $query_categories = "SELECT * FROM categories";
    $query_brands = "SELECT * FROM brands ORDER BY name";
    $query_types = "SELECT * FROM types ORDER BY name";
    
    $brands = mysqli_query($con, $query_brands);
    $types = mysqli_query($con, $query_types);
    $products = mysqli_query($con, $query_products);
    $categories = mysqli_query($con, $query_categories);
    
    

    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://";
    } else {
        $url = "http://";
    }      
    $url.= $_SERVER['HTTP_HOST'];  
    $url.= $_SERVER['REQUEST_URI'];    

    $products_page = mysqli_query($con, $page_query);
    $records = mysqli_num_rows($products_page);
    $total_records = ceil($records / $number_per_page);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php include 'C:\xampp\htdocs\ROP\links.html'?>
    <link rel="stylesheet" href="/ROP/products_site/style/pagination.css">
    <link rel="stylesheet" href="/ROP/products_site/style/layout.css">
    
</head>
<body>
    <?php include 'C:\xampp\htdocs\ROP\nav.php'?>
    <div class="wrapper">
        <div class="search-panel">
        <a href="#" class="fa fa-arrow-right arrow"></a>
            <nav class="panel">
                <form class="fix" action="" method="get" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Vyhľadaj " name="search" value="<?php echo $search?>">
                        <button class="btn btn-outline-light s-btn" type="submit"><span class="span-search"><i class="fa fa-search" aria-hidden="true"></i></span></button>
                    </div>
                </form>

                <form class="form" method="get">
                    <fieldset onchange="this.form.submit()">
                    <label>Kategória</label>
                            <select name="category" class="form-select" onchange="admin.php">
                                >
                                <option value="all" >Všetky</option>
                                <?php foreach($categories as $i){ ?>
                                    <?php if($category==$i['name']){?>
                                    <option selected name="select" value="<?php echo $i['name'] ?>">
                                    <?php echo $i['name']?>
                                    </option>
                                    <?php }else{?>  
                                    <option name="select" value="<?php echo $i['name'] ?>">
                                    <?php echo $i['name']?>
                                    </option>
                                    <?php }?>  
                                <?php }?>
                            </select>
                        <label>Značka</label>
                            <select name="brand" class="form-select" onchange="admin.php">
                                
                                <option value="all" >Všetky</option>
                                <?php foreach($brands as $i){ ?>
                                    <?php if($brand==$i['name']){?>
                                    <option selected name="select" value="<?php echo $i['name'] ?>">
                                    <?php echo $i['name']?>
                                    </option>
                                    <?php }else{?>  
                                    <option name="select" value="<?php echo $i['name'] ?>">
                                    <?php echo $i['name']?>
                                    </option>
                                    <?php }?>  
                                <?php }?>
                            </select>
                            <label>Druh vône</label>
                            <select name="type" class="form-select" onchange="admin.php">
                                
                                <option value="all" >Všetky</option>
                                <?php foreach($types as $i){ ?>
                                    <?php if($type==$i['name']){?>
                                    <option selected name="select" value="<?php echo $i['name'] ?>">
                                    <?php echo $i['name']?>
                                    </option>
                                    <?php }else{?>  
                                    <option name="select" value="<?php echo $i['name'] ?>">
                                    <?php echo $i['name']?>
                                    </option>
                                    <?php }?>  
                                <?php }?>
                            </select>    
                        
                        <noscript><button type="submit" class="btn btn-primary">Submit</button></noscript>
                    </fieldset>
                    <fieldset onchange="this.form.submit()">
                        <label for="price">Cena</label>
                        <div class="rangeValue">
                            <span class="rangeValueSpan">
                                <?php echo number_format($price, 0, ',', ' ')?>
                            </span>
                            
                        </div>
                        <div class="prices">
                            <div><?php echo number_format($min_value,2,","," "), ' €'?></div>
                            <div><?php echo number_format($max_value,2,","," "), ' €'?></div>
                        </div>
                        <input class="range" step=".01" type="range" name="price" min="<?php echo number_format($min_value,2,"."," ")?>" max="<?php echo number_format($max_value,2,"."," ")?>" value="<?php echo $price?>">
                        <br>
                        <div style="width: 100%; text-align: center;">
                            <a href="products_site.php"  type="button" style="color: #595959; ">Zrušiť vybrané parametre</a>
                        </div>                          
                        <noscript><button type="submit" class="btn btn-primary">Submit</button></noscript>
                    </fieldset >
                </form>
            </nav>             
        </div>
        <div class="back">
            <div class="products">
            <?php $count = 0;
                if ($records == 0) { ?>
                    <style>
                        .wrapper-pagination {
                            display: none;
                        }
                        @media (max-width: 1080px) {
                            .wrapper .products {
                                grid-template-columns: repeat(1,1fr);
                            }
                        }
                        @media (max-width: 1365px) {
                            .wrapper .products {
                                grid-template-columns: repeat(1,1fr);
                            }
                        }
                        .wrapper .products {
                                grid-template-columns: repeat(1,1fr);
                            }
                       
                    </style>
                    <div class="no-results-grid">
                        <i class="fa fa-frown-o no-results" aria-hidden="true"> Nenašli sa hľadané produkty</i>
                    </div>
                    
                <?php }?> 
                
                <?php foreach($products as $i => $product){?>          
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
            <div class="wrapper-pagination">
        <?php 
            if(str_contains($url, '?')){
                $url .= '&page=';
            }else{
                $url .= '?page=';
            }
            ?>
        <a href="<?php
        echo $url, $page - 1?>" class="button prev"><</a>
        <ul>
            <?php
            for ($i = 1; $i <= $total_records; $i++) {
                
                ?>
                <li><a <?php if ($page == $i) {echo "class=active";}?> href="<?php echo $url, $i?>"><?php echo $i?></a></li>
            <?php }?>
        </ul>
        <a href="<?php 
        if($page + 1 > $total_records){
            echo $url, $page;
        }else{
            echo $url, $page + 1;
        }
        ?>" class="button next">></a>
    </div>
        </div>
        
    </div>
    
    <?php include 'C:\xampp\htdocs\ROP\footer.html'?>
</body>
</html>
<script src="/ROP/main_page/js-file/script.js"></script>