<?php
$opts = array('http' => array('header'=> 'Cookie: ' . $_SERVER['HTTP_COOKIE']."\r\n"));
$context = stream_context_create($opts);
session_write_close(); // unlock the file
$contents = file_get_contents('http://localhost/ROP/products_site/order_customer.php', false, $context);
session_start(); // Lock the file
echo $contents;


?>