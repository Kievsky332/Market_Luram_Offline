<?php
$quantity = null;
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_POST['tovar'])){
	session_start();
	$tovar = (int)$_POST['tovar'];
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'][$tovar] += 1;
    } else {
        $_SESSION['cart'][$tovar] = 1;
    }
} 
header("Location: /luram");
?>