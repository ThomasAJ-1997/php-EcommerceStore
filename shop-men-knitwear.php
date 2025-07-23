<?php

global $products;
global $product_name;

require 'classes/Connect.php';
require 'classes/Products.php';

$db = new Connect();
$conn = $db->connect();

$product_class = new Products();
$category_name = 'knitwear';


?>

<?php require 'includes/header.php'; ?>

<?php require 'includes/nav.php'; ?>

    <section class="shop-headline">
        <h2 class="shop-heading">KNITWEAR</h2>
        <p> Our knitwear range provides a timeless aesthetic, soft to the touch and a staple piece for any Pioneers wardrobe. </p>

        <?php require 'includes/filter-menu.php'; ?>

        <?php require 'data/filter-by-type-data.php'; ?>





    </section>

<?php if($products): ?>

    <section class="home-section" style="margin-bottom: 4rem;">
        <div class="item-list">
            <div class="item-collection"
                 style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                <?php foreach ($products as $product): ?>
                    <div class="item item1" style="text-align: center;">
                        <div>
                            <a href="">
                                <img src="presentation-imgs/<?= $product['product_front_image']; ?>.webp" style="width: 100%;">
                                <div class="item-information">
                                    <p> <?= htmlspecialchars($product['product_name']); ?> </p>
                                    <p> £<?= htmlspecialchars($product['original_price']) ?> </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php else : ?>
    <section class="home-section" style="margin-bottom: 4rem;">
        <p class="no-products-found-text">No Products Found.</p>
    </section>
<?php endif; ?>


    <style>
        .shop-headline {
            margin: auto;
            width: 90%;
            height: 30vh;
            margin-top: 15rem;
        }

        .shop-headline h2{
            font-size: 5rem;
            font-weight: 400;
        }

        .shop-headline p {
            font-size: 2rem;
            font-weight: 400;
        }
    </style>


    <script>
        document.querySelector(".filter-button").addEventListener("click", function () {
            const dropdown = document.querySelector(".filter-dropdown");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        });
    </script>




<?php require 'includes/carousel.php'; ?>

    <section class="break"> </section>

<?php require 'includes/footer.php'; ?>