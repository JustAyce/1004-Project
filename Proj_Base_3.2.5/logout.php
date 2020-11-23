<!DOCTYPE html>

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


        <main class="container">
            <?php
            if (isset($_SERVER['HTTP_REFERER'])) {
                session_start();
                session_destroy();
                include "nav.inc.php";
                header("Refresh:1; url=index.php");
            } else {
                echo "<h2>Cannot access this page directly!</h2>";
                header("Refresh:0; url=index.php");
                exit();
            }
            ?>
            <h2>Bringing you back to the main page</h2> 
        </main>
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>

