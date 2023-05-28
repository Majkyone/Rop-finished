<?php
    session_start();
        if(!isset($_SESSION['AdminLoginId'])){
        header("location: login.php");
    }

    include 'C:\xampp\htdocs\ROP\connect.php';
    $id = $_GET['id'];
    $sql_orders = "SELECT orders.id_order, orders.id_customer, products.image, products.title, products.price AS 'product_price', COUNT(orders.id_order) AS 'number_of_products',products.quantity, orders.amount, orders.price FROM orders
    JOIN products ON products.id_product = orders.id_product
    JOIN customers ON customers.id_customer = orders.id_customer WHERE orders.id_customer = '$id' GROUP BY id_order";
    $orders = mysqli_query($con, $sql_orders);
    $sql_customer = ("SELECT * FROM customers WHERE id_customer = '$id'");
    $customer = mysqli_query($con, $sql_customer);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include 'C:\xampp\htdocs\ROP\links.html'?>
    <link rel="stylesheet" href="/ROP/products_site/style/cart.css">
    <link rel="stylesheet" href="/ROP/products_site/style/order-form.css">
</head>
<body>
    <?php foreach ($customer as $i) { ?>
        <div class="form-1">
            <form method="post">
                <div class="udaje">
                    <div class="mb-3">
                        <label class="form-label contact">Kontaktné údaje</label>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Meno</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $i['name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Priezvisko</label>
                        <input type="text" class="form-control" name="surname" value="<?php echo $i['surname']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Telefón</label>
                        <input type="tel" class="form-control" name="telephone"  pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"required value="<?php echo $i['telephone']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $i['email']; ?>" readonly>
                    </div>
                </div>
                <div class="adresa">
                    <div class="mb-3">
                        <label class="form-label contact">Kontaktná adresa</label>
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Ulica</label>
                        <input type="text" class="form-control" name="street" value="<?php echo $i['street']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Mesto</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $i['city']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="psc" class="form-label">PSČ</label>
                        <input type="tel" class="form-control" name="psc" value="<?php echo $i['psc']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">Štát</label>
                        <input type="text" class="form-control" name="state" value="<?php echo $i['state']; ?>"readonly>
                    </div>
                </div>    
            </form>
        </div>
    <?php }?>    
    <div class="container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Mnozstvo</th>
                <th>Celkova cena</th>
            </tr>
            
            <?php
                foreach($orders as $order){ ?>
                <form method="post">
                    <tr 
                    <?php if ($order['quantity'] < $order['amount']) { ?>
                            style="background: red;"
                        <?php } else { ?>
                            style="none";
                        <?php }?>>
                        <td>
                            <div class="cart-info">
                                <img src="/ROP/admin_site/<?php echo $order['image'] ?>" alt="">
                                <div>
                                    <p class="product-name"><?php echo $order['title']?></p>    
                                    <p><?php echo number_format($order['product_price'],2,","," "), ' €' ?></p>
                                </div>
                            </div>
                        </td>
                        <td><input name="change" type="text" value="<?php echo $order['amount'];?>" min="1" max="10" readonly>
                        <td><?php $full_price = $order['amount'] * $order['product_price'];
                            echo number_format($full_price,2,","," "), ' €' ?></td>
                    </tr>   
                </form> 
                <?php }?>

        </table>
        <div class="total-price">
            <table>
                
                <tr>
                    <td>Bez dane</td>
                    <td><?php echo number_format($order['price'] * 0.8,2,","," "), ' €'?></td>
                </tr>
                <tr>
                    <td>Daň</td>
                    <td><?php echo number_format($order['price'] - ($order['price'] * 0.8),2,","," "), ' €'?></td>
                </tr>
                <tr>
                    <td>K úhrade</td>
                    <td><?php echo number_format($order['price'],2,","," "), ' €'?></td>
                </tr>

            </table>
            <div class="buttons">
                <a href="order_accept.php?id=<?php echo $order['id_customer']?>" class="btn btn-sm btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                <a href="order_denied.php?id=<?php echo $order['id_customer']?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</body>
</html>