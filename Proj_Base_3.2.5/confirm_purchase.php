<?php

//Update db status to confirmed order.
session_start();
require_once 'cart_actions.php';
$cart_actions = new cart_actions();


if (isset($_POST['submit'])) {
    if (!empty($_POST['pickup-location'])) {
        $location = $_POST['pickup-location'];

        $mem_email = $_SESSION["user_details"]["email"];
        $cartItem = $cart_actions->getMemberCartItem($mem_email);

        $message = '
<html>
    <body>
    <p>You have chosen to pick up at ' . $location . '</p>
        <p>Here are your confirmed order:</p>
        <table>
            <tr>
                <th>Item</th><th>Quantity</th><th>Price</th>
            </tr>'
?>
        <?php

        if (is_array($cartItem) || is_object($cartItem)) {
            foreach ($cartItem as $key => $value) {
                $productName = $value["Name"];
                $quantity = $value["quantity"];
                $productPrice = $value["Price"] * $quantity;
                $message .= "<tr>
                <td>$productName</td><td>$quantity</td><td>$$productPrice</td>
            </tr>";
            }
        }
        ?> <?php

        ' 
        </table>
    </body>
</html>
';
        $sender_email = "amistake66@gmail.com";
        $sender_name = "8Bikes.co";
        $subject = "Purchase Order";
        $mailHeaders = "From: $sender_name" . "<$sender_email>\r\n";
        $mailHeaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        if (mail($mem_email, $subject, $message, $mailHeaders)) {
            echo "Your order has been confirmed! Details will be sent to you at: " . $mem_email;
            header("Refresh:2; url=index.php");
        } else {
            print "<p class='Error'>Problem in Sending Mail.</p>";
        }
    } else {
        echo 'Invalid Location selected';
    }
} else {
    echo"smth went wrong";
}

