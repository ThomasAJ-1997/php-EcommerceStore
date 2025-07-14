<?php
require 'classes/Connect.php';
require 'classes/Products.php';

$db = new Connect();
$conn = $db->connect();

$product_class = new Products();

$products_new_arrivals = $product_class->product_new_arrivals($conn);
$products_bestsellers = $product_class->product_bestsellers($conn);
?>

<?php require 'includes/header.php'; ?>

<?php require 'includes/nav.php'; ?>

<section class="hero-section" style="margin-bottom: 4rem;">
    <div class="hero-box">
        <div class="hero-text">
            <h1 class="sons-headline">SONS</h1>
            <a href="shop-all.php">SHOP NOW ></a>
        </div>
    </div>
</section>

<section class="home-section" style="margin-bottom: 4rem;">
    <div class="item-list">
        <div class="item-text"
             style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <p>New Arrivals</p>
            </div>
            <div>
                <p><a href="shop-new-arrivals.php">View All</a></p>
            </div>
        </div>

        <div class="item-collection"
             style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
            <?php foreach ($products_new_arrivals as $product_new): ?>
                <div class="item item1" style="text-align: center;">
                    <div>
                        <a href="">
                            <img src="presentation-imgs/<?= $product_new['product_front_image']; ?>.webp" style="width: 100%;">
                            <div class="item-information">
                                <p> <?= htmlspecialchars($product_new['product_name']); ?> </p>
                                <p> £<?= htmlspecialchars($product_new['original_price']) ?> </p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<section class="advertisement-section">
    <div class="advert-container">
        <div class="advertisement">
            <div class="advert-information">
                <span>Invest in style today</span>
                <h2>SUMMER <br> SHIRTS</h2>
                <p>Keep it classic this season with our range of shirts inspired by the icons of style
                    <strong>Invest in timeless style</strong></p>
                <a href="">SHOP SHIRTS ></a>
            </div>
        </div>
        <div class="advertisement">
            <div class="advert-information">
                <span>Elevate your look</span>
                <h2>LIGHTWEIGHT <br> TOPS</h2>
                <p>Complete your look with tops that combine elegance, comfort and lasting quality</p>
                <a href="">SHOP TOPS ></a>
            </div>
        </div>
    </div>
</section>

<section class="presale-section">
    <div class="presale-information">
        <h2><i>SONS</i> Pre-loved</h2>
        <p>Our new home for worn and unworn pieces from the SONS community.</p>
        <a href="">COMING SOON ></a>
    </div>
</section>

<section class="home-section" style="margin-bottom: 4rem;">
    <div class="item-list">
        <div class="item-text"
             style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <p>Best Sellers</p>
            </div>
            <div>
                <p><a href="shop-all.php">View All</a></p>
            </div>
        </div>

        <div class="item-collection"
             style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
            <?php foreach ($products_bestsellers as $product_best): ?>
                <div class="item item1" style="text-align: center;">
                    <div>
                        <a href="">
                            <img src="presentation-imgs/<?= $product_best['product_front_image']; ?>.webp" style="width: 100%;">
                            <div class="item-information">
                                <p> <?= htmlspecialchars($product_best['product_name']); ?> </p>
                                <p> £<?= htmlspecialchars($product_best['original_price']) ?> </p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        </div>
</section>

<section class="advertisement-section advertisement-section2">
    <div class="advert-container">
        <div class="advertisement advertisement2">
            <div class="advert-information">
                <span>Invest in style today</span>
                <h2>CLASSIC <br> JACKETS </h2>
                <p>Elevate your seasonal style with our collection of durable, classic jackets</p>
                <a href="">SHOP JACKETS ></a>
            </div>
        </div>
        <div class="advertisement advertisement2">
            <div class="advert-information">
                <span>Elevate your look</span>
                <h2>ICONIC <br> BOTTOMS </h2>
                <p>Discover trousers that blend durability, functionality and effortless style - <strong> form work and leisure </strong> </p>
                <a href="">SHOP BOTTOMS ></a>
            </div>
        </div>
    </div>
</section>

<?php require 'includes/carousel.php'; ?>

<section class="break"> </section>

<?php require 'includes/footer.php'; ?>






