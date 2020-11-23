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

        <?php
        session_start();
        include "nav.inc.php";
        if (isset($_SESSION['login_success'])) {
            $login_status = $_SESSION['login_success'];
            if ($login_status == true) {

                echo "<h2>Already Logged In!</h2>";
                header("Refresh:0; url=index.php");
                exit();
            } else {
                session_destroy();
            }
        } else {
            
        }
        ?>

        <main class="container">
            <h2>Member Login</h2>
            <p>
                Existing members log in here. For new members, please go to the
                <a href="register.php">Sign Up page.</a>.
            </p>
            <form action="process_login.php" method="post">
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input class="form-control" type="text" id="email"
                           name="email" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input class="form-control" type="password" id="pwd"
                           name="pwd" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </main>
        <?php
        include "footer.inc.php";
        $_SESSION['submitted_form'] = true
        ?>
    </body>
</html>

