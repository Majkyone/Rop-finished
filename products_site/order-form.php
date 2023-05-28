<?php 
    session_start();
    include 'C:\xampp\htdocs\ROP\connect.php';
    foreach($_SESSION['cart'] as $i){
        if($i['amount'] <= 0){
            header("Location: cart.php?id_product=$i[product_id]");
        }
    }
    $product_id = array_column($_SESSION['cart'], 'product_id');
    $query_products = "SELECT * FROM products";
    $result = mysqli_query($con, $query_products);
    
    if(isset($_POST['continue'])){
        
        if(isset($_SESSION['order'])){
            $order_array = array(
                'name' => $_POST['name'],
                'surname' => $_POST['surname'],
                'telephone' => $_POST['telephone'],
                'email' => $_POST['email'],
                'street' => $_POST['street'],
                'city' => $_POST['city'],
                'psc' => $_POST['psc'],
                'state' => $_POST['state']
            );
            
            $_SESSION['order'] = $order_array;
            if(empty($_POST['name'] and $_POST['surname'] and $_POST['telephone'] and $_POST['email'] and $_POST['street'] and $_POST['city'] and $_POST['psc'] and $_POST['state'])){
                header('Location: order-form.php');
            }else{        
                header("location: order-form2.php");
            }
        }else{
            $order_array = array(
                'name' => $_POST['name'],
                'surname' => $_POST['surname'],
                'telephone' => $_POST['telephone'],
                'email' => $_POST['email'],
                'street' => $_POST['street'],
                'city' => $_POST['city'],
                'psc' => $_POST['psc'],
                'state' => $_POST['state']
            );
        $_SESSION['order'] = $order_array;
        if(empty($_POST['name'] and $_POST['surname'] and $_POST['telephone'] and $_POST['email'] and $_POST['street'] and $_POST['city'] and $_POST['psc'] and $_POST['state'])){
            header('Location: order-form.php');
        }else{        
            header("location: order-form2.php");
        }
        };
    };
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
                    <input type="text" class="form-control" name="name" pattern="[a-zA-ZáäčďžéíĺľňóôŕšťúýÁÄČĎŽÉÍĹĽŇÓÔŔŠŤÚÝ\s]+" required value="<?php echo $_SESSION['order']['name'] ?? null?>">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Priezvisko</label>
                    <input type="text" class="form-control" name="surname" pattern="[a-zA-ZáäčďžéíĺľňóôŕšťúýÁÄČĎŽÉÍĹĽŇÓÔŔŠŤÚÝ\s]+" required value="<?php echo $_SESSION['order']['surname'] ?? null?>">
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">Telefón</label>
                    <input type="tel" class="form-control" name="telephone" placeholder="XXXX-XXX-XXX" pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}" required value="<?php echo $_SESSION['order']['telephone'] ?? null?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" required value="<?php echo $_SESSION['order']['email'] ?? null?>">
                </div>
            </div>
            <div class="adresa">
                <div class="mb-3">
                    <label class="form-label contact">Kontaktná adresa</label>
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Ulica</label>
                    <input type="text" class="form-control" name="street" required value="<?php echo $_SESSION['order']['street'] ?? null?>">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Mesto</label>
                    <input type="text" class="form-control" name="city" pattern="[a-zA-ZáäčďžéíĺľňóôŕšťúýÁÄČĎŽÉÍĹĽŇÓÔŔŠŤÚÝ\s]+" required value="<?php echo $_SESSION['order']['city'] ?? null?>">
                </div>
                <div class="mb-3">
                    <label for="psc" class="form-label">PSČ</label>
                    <input type="tel" class="form-control" name="psc" required value="<?php echo $_SESSION['order']['psc'] ?? null?>">
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">Štát</label>
                    <input type="text" class="form-control" name="state" pattern="[a-zA-ZáäčďžéíĺľňóôŕšťúýÁÄČĎŽÉÍĹĽŇÓÔŔŠŤÚÝ\s]+" required value="<?php echo $_SESSION['order']['state'] ?? null?>">
                </div>
            </div>
            <a href="cart.php" type="submit" class="btn btn-primary">Späť</a>
            <button type="submit" name="continue" class="btn btn-primary">Pokračovať</button>    
        </form>
    </div>
    <?php include 'C:\xampp\htdocs\ROP\footer.html'?>
</body>
</html>