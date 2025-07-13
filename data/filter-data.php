<?php

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
        $category = 'shirts';
        $products = $product_class->get_all_products_by_category($conn, $category);
        break;
    case 'tops':
        $category = 'tops';
        $products = $product_class->get_all_products_by_category($conn, $category);
        break;
    case 'jackets':
        $category = 'jackets';
        $products = $product_class->get_all_products_by_category($conn, $category);
        break;
    case 'bottoms':
        $category = 'bottoms';
        $products = $product_class->get_all_products_by_category($conn, $category);
        break;
    case 'knitwear':
        $category = 'knitwear';
        $products = $product_class->get_all_products_by_category($conn, $category);
        break;
    case 'accessories':
        $category = 'accessories';
        $products = $product_class->get_all_products_by_category($conn, $category);
        break;
}
//
if (empty($_GET['feature']) && empty($_GET['product']) && isset($_GET['start_price']) && isset($_GET['end_price'])) {
    $products = $product_class->get_product_price_filter($conn, $_GET['start_price'], $_GET['end_price']);
    echo 'this price is the problem';

}


