<?php
session_start();
require_once "cart_actions.php";
$cart_actions = new cart_actions();
if (isset($_SESSION['login_success'])) {
    $login_status = $_SESSION['login_success'];
    if ($login_status == true) {
        $mem_email = $_SESSION["user_details"]["email"];
        $cart_actions->emptyCart($mem_email);

        header("Refresh:2; url=index.php");
    }
}
?>
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
    <?php include 'nav.inc.php'; ?>
    <body>
    </body>
</html>