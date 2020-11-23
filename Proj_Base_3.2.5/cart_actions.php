<?php

require_once "DBController.php";

class cart_actions {

    function getAllProduct() {
        $query = "SELECT * FROM bikes";

        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getMemberCartItem($email) {
        global $conn;
        if ($conn->connect_error) {
            $errorMsg = "Connection failed: " . $conn->connect_error;
        } else {
            $query = "(SELECT * FROM bikes, cart WHERE bikes.Name = cart.productName AND cart.email = '" . $email . "')
        UNION 
        (SELECT * FROM accessories, cart WHERE accessories.Name = cart.productName AND cart.email ='" . $email . "')";
            $cartResult = $conn->query($query);
            return $cartResult;
        }
    }

    function getProductByCode($product_code) {
        $query = "SELECT * FROM bikes WHERE code=?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $product_code
            )
        );

        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

    function getCartItemByProduct($product_id, $email) {
        $query = "SELECT * FROM cart WHERE product_id = ? AND email = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $email
            )
        );

        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function addToCart($product_id, $quantity, $email) {
        global $conn;
        if ($conn->connect_error) {
            $errorMsg = "Connection failed: " . $conn->connect_error;
        } else {
            $stmt = $conn->prepare("INSERT INTO cart (productName,quantity,email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $product_id, $quantity, $email);
            if (!$stmt->execute()) {
                $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->close();
        }

//        $this->updateDB($query, $params);
    }

    function updateCartQuantity($quantity, $email) {
        $query = "UPDATE cart SET quantity = ? WHERE email= ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $email
            )
        );

        $this->updateDB($query, $params);
    }

    function deleteCartItem($cart_id) {
        $query = "DELETE FROM cart WHERE id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );

        $this->updateDB($query, $params);
    }

    function emptyCart($email) {

        global $conn;
        if ($conn->connect_error) {
            $errorMsg = "Connection failed: " . $conn->connect_error;
        } else {
            $query = "DELETE FROM cart WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            if (!$stmt->execute()) {
                $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->close();
        }
    }

    function greet() {
//        if (!empty($_POST["quantity"])) {
        echo '<script language="javascript">';
        echo 'alert("Greetings!!")';
        echo '</script>';
//        }
    }

}
