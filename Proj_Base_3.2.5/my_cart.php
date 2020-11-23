<?php
session_start();

require_once "cart_actions.php";
$cart_actions = new cart_actions();
if (isset($_SESSION['login_success'])) {
    $login_status = $_SESSION['login_success'];
    if ($login_status == true) {
        $email = $_SESSION["user_details"]["email"];
        require 'nav.inc.php';
    } else {
        header("Refresh:0; url=index.php");
    }
} else {
    header("Refresh:0; url=index.php");
}
?>
<!doctype HTML>
<html>
    <head>
        <title>World of Bikes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Bootstrap CSS-->
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">

        <!--Custom CSS-->
        <link rel="stylesheet" href="css/main.css">

        <!--jQuery-->
        <script defer
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>

        <!--Bootstrap JS-->
        <script defer
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
                integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
                crossorigin="anonymous">
        </script>

        <!-- Custom JS -->
        <script defer
        src="js/main.js"></script>

    </head>
    <body>
        <h2> Your cart</h2>
        <div class="Cart Items">
            <?php
            $cartItem = $cart_actions->getMemberCartItem($email);

            if (is_array($cartItem) || is_object($cartItem)) {
                // If yes, then foreach() will iterate over it.
                foreach ($cartItem as $key => $value) {
                    $productName = $value["Name"];
                    $productImage = $value["img"];
                    $productQuantity = $value["quantity"];
                    ?>
                    <div class="product-item">
                        <div class="product-container"><img class="product-image" src=<?php echo$productImage ?>></div>
                        <div class="product-tile-footer">
                            <div id="productPrice"class="product-Name"><?php echo$productQuantity . "x " . $productName ?></div>
                        </div>
                    </div>

                    <?php
                }
                ?>

            </div>
        <div class="Empty Cart">
            <a href="emptyCart.php" class="button">Empty cart</a>
        </div>
            <div class="Checkout">
                <form action="confirm_purchase.php" method="post">
                    <select name="pickup-location">
                        <option value="" disabled selected>Choose option</option>
                        <option value="Admirality">Admirality</option>
                        <option value="Eunos">Eunos</option>
                        <option value="Bishan">Bishan</option>
                        <option value="Jurong East">Jurong East</option>
                    </select>
                    <br><br>
                    <input type="submit" name="submit" vlaue="Confirm Order">
                </form>
            </div>
            <?php
        } else { // If $myList was not an array, then this block is executed. 
            echo "Unfortunately, an error occured.";
        }
        ?>

    </body>
</html>