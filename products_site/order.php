<?php 
    session_start();
    include 'C:\xampp\htdocs\ROP\connect.php';

    $product_id = array_column($_SESSION['cart'], 'product_id');
    //$query_products = "SELECT id_product FROM products"; asi netreba
    //$result = mysqli_query($con, $query_products);
    $amount = array_column($_SESSION['cart'],  'amount');

    $name = $_SESSION['order']['name'];
    $surname = $_SESSION['order']['surname'];
    $telephone = $_SESSION['order']['telephone'];
    $email = $_SESSION['order']['email'];
    $street = $_SESSION['order']['street'];
    $city = $_SESSION['order']['city'];
    $psc = $_SESSION['order']['psc'];
    $state = $_SESSION['order']['state'];
    $email = $_SESSION['order']['email'];
    $name = $_SESSION['order']['name'];
    $surname = $_SESSION['order']['surname'];
    $url = "https://script.google.com/macros/s/AKfycbzKTONKkS1e39eAqNV1tpnyLaNpDy_PtkiMTW23mOOrPpT7LTTJavONt2Bht-TfcWgX/exec";

    $ch = curl_init($url);

    $opts = array('http' => array('header'=> 'Cookie: ' . $_SERVER['HTTP_COOKIE']."\r\n"));
    $context = stream_context_create($opts);
    session_write_close(); // unlock the file
    $contents = file_get_contents('http://localhost/ROP/products_site/order_customer.php', false, $context);
    session_start();
    $date = date("Y-m-d H:i:s");


    $order_msg = $contents;
    $data = array(
        "recipient" => "$email",
        "subject" => "Objednávka",
        "body" => "$name $surname\nĎakujeme Vám za Vašu objednávku. O spracovaní objednávky Vás budeme neskôr informovať.\n\nPrajeme Vám krásny deň!\n$order_msg",
        "isHTML" => 'true'
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
echo $result;
    session_destroy();
    header("location: cart.php"); //funguje email
    $sql = ("INSERT INTO customers (name, surname, telephone, email, street, city, psc, state) VALUES 
    ('$name', '$surname', '$telephone', '$email', '$street', '$city', '$psc', '$state')");

    $query = mysqli_query($con,$sql);
    //$customer = ("SELECT * FROM ")
    $index = 0;
    $sql_customer = ("SELECT MAX(id_customer) FROM customers");
    
    $query_customer = mysqli_query($con,$sql_customer);
    foreach($query_customer as $i){
        $customer = $i['MAX(id_customer)'];
    }
    foreach($product_id as $id){
        $sql_order = ("INSERT INTO orders (id_product, id_customer, amount, price, order_time) VALUES
        ('$id', '$customer', '$amount[$index]', '$_SESSION[price]', '$date')");
        $index = $index + 1;
        $query = mysqli_query($con,$sql_order);
    };

?>