<?php
    session_start();
    if(!isset($_SESSION['AdminLoginId'])){
    header("location: login.php");
    }

    include 'C:\xampp\htdocs\ROP\connect.php';
    $id = $_GET['id'];

    $sql = ("SELECT name, surname, email FROM customers WHERE id_customer = '$id'");
    $sql_orders = "DELETE FROM orders WHERE id_customer = '$id'";
    $sql_customers = "DELETE FROM customers WHERE id_customer = '$id'";
    $query = mysqli_query($con, $sql);
    
    foreach($query as $i){
        $name = $i['name'];
        $surname = $i['surname'];
        $email = $i['email'];
    }

    $url = "https://script.google.com/macros/s/AKfycbzlj6Z-9mJYOuTeHHrl8L2ib-H72zmNyFvGDzHfADPsPiCRRieY5wtl8zrKrUCT43JPkQ/exec";
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POSTFIELDS => http_build_query([
            "recipient" => "$email",
            "subject" => "Objednávka",
            "body" => "$name $surname\nVaša objednávka bola zamietnutá. Pre bližčie informácie nás kontaktujte prostredníctvom e-mailu alebo telefonicky.\n\nPrajeme Vám krásny deň!"
        ])
    ]);
    $result = curl_exec($ch);
    $query_orders = mysqli_query($con, $sql_orders);
    $query_customers = mysqli_query($con, $sql_customers);
    header("LOCATION: orders.php");
?>