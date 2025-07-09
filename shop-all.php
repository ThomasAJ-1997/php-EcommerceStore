<?php

require 'classes/Connect.php';
require 'classes/Items.php';

$db = new Connect();
$conn = $db->connect();

$item_class = new Items();
$items = $item_class->all_items($conn);



?>

<?php require 'includes/header.php'; ?>

<?php require 'includes/nav.php'; ?>


<section class="shop-headline">
    <h2 class="shop-heading">SHOP ALL</h2>
    <p>Discover unique vintage-inspired workwear clothing designed for craftspeople, artisans
    and pioneers. Our collection features durable and stylish pieces inspired by the pasy and
    made from hard-wearing materials for modern life.</p>

    <?php require 'includes/filter-menu.php'; ?>
</section>

<?php if($items): ?>

    <section class="home-section" style="margin-bottom: 4rem;">
        <div class="item-list">
            <div class="item-collection"
                 style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                <?php foreach ($items as $item): ?>
                <div class="item item1" style="text-align: center;">
                    <div>
                        <a href="">
                            <img src="presentation-imgs/<?= $item['product_front_image']; ?>.webp" style="width: 100%;">
                            <div class="item-information">
                                    <p> <?= htmlspecialchars($item['product_name']); ?> </p>
                                <p> £<?= htmlspecialchars($item['original_price']) ?> </p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php else : ?>
<p>No items: Coming Soon.</p>
<?php endif; ?>

<?php require 'includes/carousel.php'; ?>

<section class="break"> </section>

<?php require 'includes/footer.php'; ?>






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

    .shop-section {
        height: 225%;
    }

</style>


<script>
    document.querySelector(".filter-button").addEventListener("click", function () {
        const dropdown = document.querySelector(".filter-dropdown");
        dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
    });
</script>







