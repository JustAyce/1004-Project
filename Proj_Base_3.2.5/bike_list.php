<div id="product-grid">
    <div class="txt-heading">
        <div class="txt-heading-label"><h2>Road Bikes</h2></div>
    </div>
    <?php
    if (isset($_SESSION['user_details'])) {
        $login_status = $_SESSION['user_details']['email'];
    } else {
        $login_status="false";
    }
    $product_array = $conn->query("SELECT * FROM bikes ORDER BY id ASC");
    if (!empty($product_array)) {
        foreach ($product_array as $key => $value) {
            $productName = $value["Name"];
            $productImage = $value["img"];
            $productPrice = $value["Price"];
            ?>
            <div class="product-item">
                <form id="myform" method="post">
                    <div class="product-container"><img class="product-image" src=<?php echo$productImage ?>></div>
                    <div class="product-tile-footer">
                        <div id="productName"class="product-title"><?php echo$productName ?></div>
                        <div id="productPrice"class="product-price">$<?php echo$productPrice ?></div>

                        <div class="input-group plus-minus-input">
                            <div class="input-group-button">
                                <button type="button" class="button hollow circle" data-quantity="minus" data-field=<?php echo"'" . $productName . "'" ?>>
                                    <i class="fa-minus" aria-hidden="true"></i>
                                </button>
                            </div>
                            <input class="input-group-field" type="number" readonly id="quantity_" name="<?php echo"quantity_" . $productName ?>" value="0">
                            <div class="input-group-button">
                                <button type="button" class="button hollow circle" data-quantity="plus" data-field=<?php echo"'" . $productName . "'" ?>>
                                    <i class="fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="product-tile-cart">
                                <input class="add-to-cart" type="image" src="images/add-to-cart.png" alt="Add to cart"/>
                                <input hidden name="login_status" id='login_status' value="<?php echo $login_status?>"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>
</div>