<?php
    session_start();
        if(!isset($_SESSION['AdminLoginId'])){
        header("location: login.php");
    }

    include 'C:\xampp\htdocs\ROP\connect.php';

    $sql_orders = "SELECT customers.id_customer, CONCAT(customers.name, ' ', customers.surname) AS 'name', COUNT(orders.id_order) AS 'number_of_products', orders.price, orders.order_time FROM orders
    JOIN products ON products.id_product = orders.id_product
    JOIN customers ON customers.id_customer = orders.id_customer GROUP by customers.id_customer ORDER BY order_time DESC";
    $orders = mysqli_query($con, $sql_orders);
    $sql_amounts = "SELECT products.quantity, orders.amount FROM orders
    JOIN products ON products.id_product = orders.id_product";
    $amounts = mysqli_query($con, $sql_amounts);
    
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
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="style/form.css">
</head>
<body>
<div class="main-nav">
    <H1>Objednávky</H1>
    <div class="right">
      <div class="nav-i">
        <a href="admin.php" class="orders btn btn-outline-light">
        <i class="fa fa-tags" aria-hidden="true"></i>
          Produkty</a>
        <form method="POST">
          <button class="log-out btn btn-outline-danger" name="log_out">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            LOG OUT</button>
        </form>
        <?php 
          if(isset($_POST['log_out'])){
              session_destroy();
              header("location: login.php");
          }
        ?>
      </div>
    </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Meno zákazníka</th>
        <th scope="col">Počet produktov</th>
        <th scope="col">Cena</th>
        <th scope="col">Čas objednania</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <?php foreach($orders as $i => $order){?>
      <tr>
        <td data-label="ID" scope="row"><?php echo $order['id_customer'] ?></td>
        <td data-label="Meno zákazníka"><a href="order_info.php?id=<?php echo $order['id_customer']?>"><?php echo $order['name'] ?></a></td>
        <td data-label="Počet produktov"><?php echo $order['number_of_products'] ?></td>
        <td data-label="Cena"><?php echo number_format($order['price'],2,","," "), ' €' ?></td>  
        <td data-label="Cas"><?php echo $order['order_time'] ?></td>    
      </tr>
      <?php }?>
    </tbody>
  </table>
</body>
</html>