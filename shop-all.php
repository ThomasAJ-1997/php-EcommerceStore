<?php

require 'classes/Connect.php';
require 'classes/Products.php';

$db = new Connect();
$conn = $db->connect();

$product_class = new Products();

?>


<?php require 'includes/header.php'; ?>

<?php require 'includes/nav.php'; ?>


<section class="shop-headline">
    <h2 class="shop-heading">SHOP ALL</h2>
    <p>Discover unique vintage-inspired workwear clothing designed for craftspeople, artisans
    and pioneers. Our collection features durable and stylish pieces inspired by the past and
    made from hard-wearing materials for modern life.</p>

    <?php require 'includes/filter-menu.php'; ?>

    <?php

//    $products = $product_class->get_all_product_by_shirts($conn);
//    echo '<pre>';
//    var_dump($products);
//    echo '</pre>';
//    exit;

    $start_price = $_GET['start_price'] ?? null;
    $end_price = $_GET['end_price'] ?? null;


    switch ($_GET['feature'] ?? 'featured') {
        case 'featured':
            if (empty($_GET['product'])) {
                $products = $product_class->all_products($conn, $start_price, $end_price);
                break;
            }

        case 'new_arrivals':
            $products = $product_class->get_product_by_new_arrivals($conn);
            break;
        case 'bestselling':
            $products = $product_class->get_product_by_bestselling($conn);
            break;
        case 'alphabetical':
            $products = $product_class->get_product_alphabetical_order($conn);
            break;
        case 'price_low':
            $products = $product_class->get_product_price_low_to_high($conn);
            break;
        case 'price_high':
            $products = $product_class->get_product_price_high_to_low($conn);
            break;
        default:
            $products = null;
    }

    switch ($_GET['product'] ?? null) {
        case 'shirts':
            $products = $product_class->get_all_products_by_shirts($conn);
            break;
        case 'tops':
            $products = $product_class->get_all_products_by_tops($conn);
            break;
        case 'jackets':
            $products = $product_class->get_all_products_by_jackets($conn);
            break;
        case 'bottoms':
            $products = $product_class->get_all_products_by_bottoms($conn);
            break;
        case 'knitwear':
            $products = $product_class->get_all_products_by_knitwear($conn);
            break;
        case 'accessories':
            $products = $product_class->get_all_products_by_accessories($conn);
            break;
    }
//
    if (empty($_GET['feature']) && empty($_GET['product']) && isset($_GET['start_price']) && isset($_GET['end_price'])) {
        $products = $product_class->get_product_price_filter($conn, $_GET['start_price'], $_GET['end_price']);
        echo 'this price is the problem';

    }


    ?>

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







