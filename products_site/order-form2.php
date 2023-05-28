<?php 
    session_start();
    include 'C:\xampp\htdocs\ROP\connect.php';
    
    $product_id = array_column($_SESSION['cart'], 'product_id');
    $query_products = "SELECT * FROM products";
    $result = mysqli_query($con, $query_products);
    $amount = array_column($_SESSION['cart'],  'amount');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objednávka</title>
    <?php include 'C:\xampp\htdocs\ROP\links.html'?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/ROP/products_site/style/order-form.css">
    
</head>
<body>
    <?php include 'C:\xampp\htdocs\ROP\nav.php'?>
    
    <div class="form-1">
        <form method="post">
            <div class="udaje">
                <div class="mb-3">
                    <label class="form-label contact">Kontaktné údaje</label>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Meno</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['order']['name'];?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Priezvisko</label>
                    <input type="text" class="form-control" name="surname" value="<?php echo $_SESSION['order']['surname'];?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">Telefón</label>
                    <input type="tel" class="form-control" name="telephone"  pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"required value="<?php echo $_SESSION['order']['telephone'];?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['order']['email'];?>" readonly>
                </div>
            </div>
            <div class="adresa">
                <div class="mb-3">
                    <label class="form-label contact">Kontaktná adresa</label>
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Ulica</label>
                    <input type="text" class="form-control" name="street" value="<?php echo $_SESSION['order']['street'];?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Mesto</label>
                    <input type="text" class="form-control" name="city" value="<?php echo $_SESSION['order']['city'];?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="psc" class="form-label">PSČ</label>
                    <input type="tel" class="form-control" name="psc" value="<?php echo $_SESSION['order']['psc'];?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">Štát</label>
                    <input type="text" class="form-control" name="state" value="<?php echo $_SESSION['order']['state'];?>"readonly>
                </div>
            </div>    
        </form>
    </div>
    <div class="container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Mnozstvo</th>
                <th>Celkova cena</th>
            </tr>
            
            <?php
                $index = 0;
                
                $total = 0;
                if(isset($_SESSION['cart'])){ 
                while ($row = mysqli_fetch_assoc($result)){
                    
                    foreach ($product_id as $id) {
                        if($row['id_product'] == $id){ ?>
                        <form method="post">
                            <tr>
                                <td>
                                    <div class="cart-info">
                                        <a href="product.php?id=<?php echo $row['id_product']?>"><img src="/ROP/admin_site/<?php echo $row['image'] ?>" alt=""></a>
                                        <div>
                                            <a href="product.php?id=<?php echo $row['id_product']?>"><p class="product-name"><?php echo $row['title'] ?></p></a>
                                            <p><?php echo number_format($row['price'],2,","," "), ' €' ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td><input name="change" name="amount-change-<?php echo $index?>" type="number" value="<?php echo $amount[$index];?>" min="1" max="10" readonly>
                                <noscript><button type="submit" class="btn btn-primary">Submit</button></noscript></td>
                                <td><?php $full_price = $amount[$index] * $row['price'];
                                    echo number_format($full_price,2,","," "), ' €' ?></td>
                            </tr>   
                        </form> 
                        <?php
                            $index = $index + 1;
                            $total = $total + $full_price;
                        }?>
                    <?php }?>
                <?php }?>
            <?php } ?>
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
            <div class="buttons">
                <a href="order-form.php" type="submit" class="next-button">Späť</a>
                <a class="next-btn" href="order.php"><button class="next-button">Objednať</button></a>
            </div>
        </div>
    </div>
    <?php include 'C:\xampp\htdocs\ROP\footer.html'?>
</body>
</html>