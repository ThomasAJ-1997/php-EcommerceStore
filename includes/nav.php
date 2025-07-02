<?php

?>


<nav class="responsive-nav">
    <div class="nav-left">

        <button class="hamburger-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>


        <ul class="menu">
            <li><a href="/sonsEcommerce/shopall.php">Shop All</a></li>
            <li><a href="#">Men</a></li>
            <li><a href="#">Women</a></li>
            <li><a href="#">Collections</a></li>
        </ul>
    </div>

    <div class="nav-center">
        <img class="nav-image" src="imgs/sons.png">
    </div>

    <div class="nav-right">
        <ul class="menu">
            <li><a href="#">Blog</a></li>
            <li><a href="#">Club</a></li>
            <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
            <li><a href="dashboard.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</nav>


<style>
    .responsive-nav {
        transition: background-color 0.3s, opacity 0.3s;
    }

    .scrolled {
        background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent */
    }
</style>



