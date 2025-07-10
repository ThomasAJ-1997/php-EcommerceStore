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
            <li><a href="/sonsEcommerce/shop-all.php">Shop All</a></li>
            <li><a href="/sonsEcommerce/shop-men.php">Men</a></li>
            <li><a href="/sonsEcommerce/shop-bundle.php">Bundles</a></li>
            <li><a href="/sonsEcommerce/shop-new-arrivals.php">New Arrivals</a></li>
        </ul>
    </div>

    <div class="nav-center">
        <a href="/sonsEcommerce">
        <img class="nav-image" src="imgs/sons.png">
        </a>
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


        .menu li {
            position: relative;
        }

        .menu li:hover > ul {
            display: block;
        }

        .menu li ul {
            display: none;
            position: absolute;
            top: 100%; /* Positions the dropdown below the parent menu item */
            left: 0;
            background-color: white;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.15);
            padding: 10px 0;
            list-style: none;
            z-index: 1000;
        }

        .menu li ul li {
            padding: 8px 15px;
        }

        .menu li ul li a {
            text-decoration: none;
            color: black;
            display: block;
            white-space: nowrap;
        }

        .menu li ul li a:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .sub-menu {
            margin-top: 2.5rem;
            height: 30vh;
            width: 100vw;
            border-top: none;
        }

        .sub-menu h2 {
            border-bottom: 1px solid #000;
            padding-bottom: 3px;
        }

        .sub-menu h2,
        .sub-menu a{
            margin-left: 5rem;
        }

        .menu1 {
            margin-left: -15.7rem;
        }

        .menu2 {
            margin-left: -22.3rem;
        }

        .menu3 {
            margin-left: -31.7rem;
        }


    </style>



<style>
    .responsive-nav {
        transition: background-color 0.3s, opacity 0.3s;
    }

    .scrolled {
        background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent */
    }
</style>



