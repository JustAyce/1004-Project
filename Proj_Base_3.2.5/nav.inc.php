<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <img src="images/logo.jpg" width="70" alt="Logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#collapsible_menu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsible_menu">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" title="Home" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" title="About Us" href="about_us.php">About Us</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" title="Contact Us" href="contact_us.php">Contact Us</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" title="Products" href="products.php">Products</a>
            </li>
            <?php
            if (isset($_SESSION['user_details'])) {
                $fname = $_SESSION['user_details']['fname'];
                echo '<li class="nav-item active">
                <a class="nav-link" title="Cart" href="my_cart.php">Cart</a>
            </li>';
            }
            ?>
        </ul>
        <ul class="navbar-nav ml-auto">

            <?php
            if (isset($_SESSION['user_details'])) {
                $fname = $_SESSION['user_details']['fname'];

                echo '<li class="nav-item">
                <a class="nav-link" title="Home page" href="my_profile.php">
                    <i class="material-icons" style="font-size:2em">' . $fname . '</i>
                </a>
            </li>';
                echo '<li class="nav-item">
                <a class="nav-link" title="Logout" href="logout.php">
                    <i class="material-icons" style="font-size:2em">Logout</i>
                </a>
            </li>';
            } else {
                echo '<li class="nav-item">
                <a class="nav-link" title="Create Acount" href="register.php">
                    <i class="material-icons" style="font-size:2em">Register</i>
                </a>
            </li>';
                echo '<li class="nav-item">
                <a class="nav-link" title="Login" href="login.php">
                    <i class="material-icons" style="font-size:2em">Login</i>
                </a>
            </li>';
            }
            ?>
        </ul>
    </div>
</nav>