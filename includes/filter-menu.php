<?php


?>
<section class="shop-filters">
    <button class="filter-button"> <i class="fa fa-filter" aria-hidden="true"></i> Filter Menu</button>
    <div class="filter-dropdown">
        <form method="GET" action="">
            <div class="filter-group">
                <h2> FILTERS </h2>
                <hr>
                <label for="feature">Feature:</label>
                <div id="feature">
                    <div class="radio-button">
                        <input  type="radio" name="feature"
                               value="featured" <?php if (isset($_GET['feature']) && $_GET['feature'] == "featured") {
                            echo "checked";
                        } ?>> Featured
                    </div>
                    <div class="radio-button">
                        <input  type="radio" name="feature"
                               value="new_arrivals" <?php if (isset($_GET['feature']) && $_GET['feature'] == "new arrivals") {
                            echo "checked";
                        } ?>> New Arrivals
                    </div>
                    <div class="radio-button">
                        <input  type="radio" name="feature"
                               value="bestselling" <?php if (isset($_GET['feature']) && $_GET['feature'] == "bestselling") {
                            echo "checked";
                        } ?>> Bestselling
                    </div>
                    <div class="radio-button">
                        <input type="radio" name="feature"
                               value="alphabetical" <?php if (isset($_GET['feature']) && $_GET['feature'] == "alphabetical") {
                            echo "checked";
                        } ?>> Alphabetically, A-Z
                    </div>
                    <div class="radio-button">
                        <input  type="radio" name="feature"
                               value="price_low" <?php if (isset($_GET['feature']) && $_GET['feature'] == "price_low") {
                            echo "checked";
                        } ?>> Price, low to high
                    </div>
                    <div class="radio-button">
                        <input type="radio" name="feature"
                               value="price_high" <?php if (isset($_GET['feature']) && $_GET['feature'] == "price_high") {
                            echo "checked";
                        } ?>> Price, high to low
                    </div>
                </div>
            </div>

            <div class="filter-group">
                <label for="start_price">Start Price:
                    <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])) { echo $_GET['start_price']; } else {echo "50";} ?>">
                </label>
            </div>

            <div class="filter-group">
                <label for="end_price">End Price:
                    <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])) { echo $_GET['end_price']; } else {echo "2000";} ?>">
                </label>
            </div>

            <div class="filter-group">
                <label for="product">Product:</label>
                <div id="product">
                    <div class="radio-button">
                        <input type="radio" name="product"
                               value="shirts" <?php if (isset($_GET['product']) && $_GET['product'] == "shirts") {
                            echo "checked";
                        } ?>> Shirts
                    </div>
                    <div class="radio-button">
                        <input type="radio" name="product"
                               value="tops" <?php if (isset($_GET['product']) && $_GET['product'] == "tops") {
                            echo "checked";
                        } ?>> Tops
                    </div>
                    <div class="radio-button">
                        <input type="radio" name="product"
                               value="jackets" <?php if (isset($_GET['product']) && $_GET['product'] == "jackets") {
                            echo "checked";
                        } ?>> Jackets
                    </div>
                    <div class="radio-button">
                        <input type="radio" name="product"
                               value="bottoms" <?php if (isset($_GET['product']) && $_GET['product'] == "bottoms") {
                            echo "checked";
                        } ?>> Bottoms
                    </div>
                    <div class="radio-button">
                        <input type="radio" name="product"
                               value="knitwear" <?php if (isset($_GET['product']) && $_GET['product'] == "knitwear") {
                            echo "checked";
                        } ?>> Knitwear
                    </div>
                    <div class="radio-button">
                        <input type="radio" name="product"
                               value="accessories" <?php if (isset($_GET['product']) && $_GET['product'] == "accessories") {
                            echo "checked";
                        } ?>> Accessories
                    </div>
                </div>
            </div>
            <div class="filter-group">
                <label for="size">Size:</label>
                <select name="size" id="size">
                    <option value="">Select Size</option>
                    <option value="<?php if(isset($_GET['s'])) { echo $_GET['s']; } else {echo "s";} ?>">Small (S)</option>
                    <option value="<?php if(isset($_GET['m'])) { echo $_GET['m']; } else {echo "m";} ?>">Medium (M)</option>
                    <option value="<?php if(isset($_GET['l'])) { echo $_GET['l']; } else {echo "l";} ?>">Large (L)</option>
                    <option value="<?php if(isset($_GET['xl'])) { echo $_GET['xl']; } else {echo "xl";} ?>">Extra Large (XL)</option>
                    <option value="<?php if(isset($_GET['xxl'])) { echo $_GET['xxl']; } else {echo "xxl";} ?>">Extra Extra Large (XXL)</option>
                </select>
            </div>
            <button class="filter-button" type="submit">Apply Filters <i class="fa fa-plus" aria-hidden="true"></i> </button>
        </form>
    </div>
</section>

<style>
    .shop-filters {
        width: 90%;
        margin-top: 2rem;
    }

    .filter-button {
        padding: 1rem 2rem;
        font-size: 1.5rem;
        background-color: #000;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        position: relative;
        z-index: 1001;
    }

    .filter-dropdown {
        position: fixed;
        right: -100%;
        top: 0;
        height: 100vh;
        width: 300px;
        background: #f9f9f9;
        border-left: 1px solid #ddd;
        padding: 1rem;
        z-index: 1000;
        transition: right 0.3s ease-in-out;
    }

    .filter-group {
        margin-bottom: 1.5rem;
    }

    .filter-group h2 {
        font-size: 4rem;
    }

    .filter-group hr {
        margin-bottom: 4rem;
    }

    .filter-group label {
        display: block;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .filter-group select, input  {
        width: 100%;
        padding: 0.5rem;
        font-size: 1.5rem;
        font-family: "Playfair Display", serif;
        background-color: transparent;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 1px solid black;
    }

    .radio-button {
        display: block;
        position: relative;
        padding-left: 45px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 14px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .radio-button input {
        position: absolute;
        cursor: pointer;

    }
</style>

<script>
    document.querySelector(".filter-button").addEventListener("click", function () {
        const dropdown = document.querySelector(".filter-dropdown");
        dropdown.style.right = dropdown.style.right === "0px" ? "-100%" : "0px";
    });
</script>