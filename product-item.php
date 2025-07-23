<?php


global $products;
global $category_name;

require 'classes/Connect.php';
require 'classes/Products.php';

$db = new Connect();
$conn = $db->connect();
$product_class = new Products();

if(isset($_GET['id'])) {
    $product_id = $product_class->get_product_by_id($conn, $_GET['id']);
} else {
    echo 'Error: TODO - This will be a 404 page later';
}
?>

<?php require 'includes/header.php'; ?>

<?php require 'includes/nav.php'; ?>

<section class="shop-headline">
    <h2 class="shop-heading">MEN'S TOPS</h2>
    <p>As the seasons change, layering essentials become shirts and
        we have something for everyone in our latest lineup. Each garment is designed to make a
        statement and keep you looking effortlessly stylish whilst living your own adventures. </p>

    <?php echo 'Testing database' ?>
    <?= $product_id['product_name'] ?>



</section>

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
</style>
