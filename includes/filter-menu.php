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
                <select name="feature" id="feature">
                    <option value="">Select Feature</option>
                    <option value="featured">Featured</option>
                    <option value="arrivals">New Arrivals</option>
                    <option value="bestselling">Bestselling</option>
                    <option value="alphabetical">Alphabetically, A-Z</option>
                    <option value="price-low">Price, low to high</option>
                    <option value="price-high">Price, high to low</option>

                </select>
            </div>

            <div class="filter-group">
                <label for="start_price">Start Price:
                    <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])) { echo $_GET['start_price']; } else {echo "50";} ?>">
                </label>
            </div>

            <div class="filter-group">
                <label for="end_price">End Price:
                    <input type="text" name="end_price" value="<?php if(isset($_GET['start_price'])) { echo $_GET['end_price']; } else {echo "2000";} ?>">
                </label>
            </div>

            <div class="filter-group">
                <label for="product">Product:</label>
                <select name="product" id="product">
                    <option value="">Select Product</option>
                    <option value="shirts">Shirts</option>
                    <option value="tops">Tops</option>
                    <option value="jackets">Jackets</option>
                    <option value="bottoms">Bottoms</option>
                    <option value="knitwear">Knitwear</option>
                    <option value="accessories">Accessories</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="size">Size:</label>
                <select name="size" id="size">
                    <option value="">Select Size</option>
                    <option value="s">Small (S)</option>
                    <option value="m">Medium (M)</option>
                    <option value="l">Large (L)</option>
                    <option value="xl">Extra Large (XL)</option>
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
        margin-bottom: 2rem;
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

    .filter-group select, input {
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
</style>

<script>
    document.querySelector(".filter-button").addEventListener("click", function () {
        const dropdown = document.querySelector(".filter-dropdown");
        dropdown.style.right = dropdown.style.right === "0px" ? "-100%" : "0px";
    });
</script>