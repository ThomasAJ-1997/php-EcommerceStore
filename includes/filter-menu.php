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
                    <option value="new">New Arrival</option>
                    <option value="bestseller">Bestseller</option>
                    <option value="sale">On Sale</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="price">Price:</label>
                <select name="price" id="price">
                    <option value="">Select Price Range</option>
                    <option value="under-50">Under $50</option>
                    <option value="50-100">$50 - $100</option>
                    <option value="over-100">Over $100</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="product">Product:</label>
                <select name="product" id="product">
                    <option value="">Select Product</option>
                    <option value="shirts">Shirts</option>
                    <option value="pants">Pants</option>
                    <option value="jackets">Jackets</option>
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

    .filter-group select {
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