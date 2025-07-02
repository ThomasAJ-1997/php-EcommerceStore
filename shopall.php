<?php


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

<section class="home-section" style="margin-bottom: 4rem;">
    <div class="item-list">
        <div class="item-collection"
             style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
            <div class="item item1" style="text-align: center;">
                <div>
                    <a href="">
                        <img src="content/top.avif" style="width: 100%; height: auto;">
                        <div class="item-information">
                            <p>Placeholder Name</p>
                            <p>Placeholder Price</p>
                            <br><br>
                        </div>
                    </a>
                </div>
            </div>

            <div class="item item2" style="text-align: center;">
                <div>
                    <a href="">
                        <img src="content/top.avif" style="width: 100%; height: auto;">
                        <div class="item-information">
                            <p>Placeholder Name</p>
                            <p>Placeholder Price</p>
                            <br><br>
                        </div>
                    </a>
                </div>
            </div>

            <div class="item item3" style="text-align: center;">
                <div>
                    <a href="">
                        <img src="content/top.avif" style="width: 100%; height: auto;">
                        <div class="item-information">
                            <p>Placeholder Name</p>
                            <p>Placeholder Price</p>
                            <br><br>
                        </div>
                    </a>
                </div>
            </div>

            <div class="item item4" style="text-align: center;">
                <div>
                    <a href="">
                        <img src="content/top.avif" style="width: 100%; height: auto;">
                        <div class="item-information">
                            <p>Placeholder Name</p>
                            <p>Placeholder Price</p>
                            <br><br>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

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

<?php require 'includes/footer.php'; ?>

