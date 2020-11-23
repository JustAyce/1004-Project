<?php

require_once 'cart_actions.php';
$cart_actions = new cart_actions();
session_start();
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'quantity_') === 0) {
            $quantity = $_POST[$key];
            if ($quantity == 0) {
                break;
            }
            $productName = $_POST["productName"];
            if (isset($_POST['action'])) {
                if (isset($_SESSION['user_details'])) {
                    $email = $_SESSION['user_details']['email'];
                    $cart_actions->addToCart($productName, $quantity, $email);
                } else {
                    header("Refresh:0; url=register.php");
                }
            }
        }
    }
//    $quantity = $_POST["quantity"];
//    $productName = $_POST["productName"];
}
?>