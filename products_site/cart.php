<?php
session_start();
include 'C:\xampp\htdocs\ROP\connect.php';
$problem = $_GET['id_product'] ?? '';

if(isset($_SESSION['cart'])){
    $product_id = array_column($_SESSION['cart'], 'product_id');
    
    $query_products = "SELECT * FROM products";
    $result = mysqli_query($con, $query_products);
    if(isset($_POST['remove'])){
        if($_GET['action'] == 'remove'){
            foreach($_SESSION['cart'] as $key =>$value){
                if($value['product_id'] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    echo "<script>window.location = 'cart.php'</script>";
                }
            }
        }
    }

    if(isset($_POST['change'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($_GET['id'] == $value['product_id']){
                $_SESSION['cart'][$key]['amount'] = $_POST['change'];
            }else{
                $value['amount'] =  $value['amount'];
            }
        }
    }
    $amount = array_column($_SESSION['cart'],  'amount');

    if(empty($_SESSION['cart'])){
        session_destroy();
    }
}else{
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'C:\xampp\htdocs\ROP\links.html'?>
    <link rel="stylesheet" href="/ROP/products_site/style/cart.css">
    <title>Košík</title>
</head>
<body>
    <?php include 'C:\xampp\htdocs\ROP\nav.php'?>
    <?php
        $index = 0;
        
        $total = 0;
        if(isset($_SESSION['cart'])){ ?>
    <div class="container cart-page">
        <table>
            <tr>
                <th>Produkt</th>
                <th>Mnozstvo</th>
                <th>Celkova cena</th>
            </tr>
            
                <?php
                
                while ($row = mysqli_fetch_assoc($result)){
                    
                    foreach ($_SESSION['cart'] as $id) {
                        if($row['id_product'] == $id['product_id']){ 
                            ?>
                        <form method="post" action="cart.php?action=remove&id=<?php echo $row['id_product']?>">
                            <tr>
                                <td>
                                    <div class="cart-info">
                                        <a href="product.php?id=<?php echo $row['id_product']?>"><img src="/ROP/admin_site/<?php echo $row['image'] ?>" alt=""></a>
                                        <div>
                                            <a href="product.php?id=<?php echo $row['id_product']?>"><p class="product-name"><?php echo $row['title'] ?></p></a>
                                            <p><?php echo number_format($row['price'],2,","," "), ' €' ?></p>
                                            <br>
                                            <button name="remove">Odstrániť</button>
                                        </div>
                                    </div>
                                </td>
                                <td><input <?php if ($row['id_product'] == $problem) {
                                    echo "style='color:red'";}?> name="change" name="amount-change-<?php echo $index?>" type="number" min="1" max="10" value="<?php echo $id['amount'];?>" onchange="this.form.submit()">
                                <noscript><button type="submit" class="btn btn-primary">Submit</button></noscript></td>
                                <td><?php $full_price = $id['amount'] * $row['price'];
                                    echo number_format($full_price,2,","," "), ' €' ?></td>
                            </tr>   
                        </form> 
                        <?php
                            $index = $index + 1;
                            $total = $total + $full_price;
                        }?>
                        
                    <?php }?>
                <?php }?>
            
        </table>
        <div class="total-price">
            <table>
                <?php if (isset($_SESSION['cart'])) { ?>
                    <tr>
                        <td>Bez dane</td>
                        <td><?php echo number_format($total * 0.8,2,","," "), ' €'?></td>
                    </tr>
                    <tr>
                        <td>Daň</td>
                        <td><?php echo number_format($total - ($total * 0.8),2,","," "), ' €'?></td>
                    </tr>
                    <tr>
                        <td>K úhrade</td>
                        <td><?php echo number_format($total,2,","," "), ' €'?></td>
                    </tr>
                <?php }?>
            </table>
            <?php $_SESSION['price'] = $total?>
            <a class="next-btn" href="order-form.php"><button class="next-button">Pokračovať</button></a>
        </div>
    </div>
    <?php }else{ ?>
        <div class="container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Mnozstvo</th>
                <th>Celkova cena</th>
            </tr>
        </table>
        <div class="total-price" style="margin: 20px 0;">
            <table>
                
                <tr>
                    <td>Bez dane</td>
                    <td><?php echo number_format($total * 0.8,2,","," "), ' €'?></td>
                </tr>
                <tr>
                    <td>Daň</td>
                    <td><?php echo number_format($total - ($total * 0.8),2,","," "), ' €'?></td>
                </tr>
                <tr>
                    <td>K úhrade</td>
                    <td><?php echo number_format($total,2,","," "), ' €'?></td>
                </tr>

            </table>
        </div>
    </div>
    <style>
        .footer-distributed {
            position: absolute;
        }
    </style>
    <?php }?>
    <?php include 'C:\xampp\htdocs\ROP\footer.html'?>
</body>
</html>
<script src="/ROP/main_page/js-file/script.js"></script>