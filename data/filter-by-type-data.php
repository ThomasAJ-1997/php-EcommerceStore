<?php

$start_price = $_GET['start_price'] ?? null;
$end_price = $_GET['end_price'] ?? null;

if ($_GET['feature'] ?? 'featured') {
    $products = $product_class->product_category_type($conn, $category_name);
}


switch ($_GET['feature'] ?? 'featured') {
    case 'new_arrivals':
        $products = $product_class->get_category_type_by_new_arrivals($conn, $category_name);
        break;
    case 'bestselling':
        $products = $product_class->get_category_type_by_bestselling($conn, $category_name);
        break;
    case 'alphabetical':
        $products = $product_class->get_category_type_by_alphabetical_order($conn, $category_name);
        break;
    case 'price_low':
        $products = $product_class->get_category_type_by_price_low_to_high($conn, $category_name);
        break;
    case 'price_high':
        $products = $product_class->get_category_type_by_price_high_to_low($conn, $category_name);
        break;
    default:
}

switch ($_GET['product'] ?? null) {
    case 'shirts':
        $category = 'shirts';
        $products = $product_class->get_all_new_arrivals_by_category($conn, $category);
        break;
    case 'tops':
        $category = 'tops';
        $products = $product_class->get_all_new_arrivals_by_category($conn, $category);
        break;
    case 'jackets':
        $category = 'jackets';
        $products = $product_class->get_all_new_arrivals_by_category($conn, $category);
        break;
    case 'bottoms':
        $category = 'bottoms';
        $products = $product_class->get_all_new_arrivals_by_category($conn, $category);
        break;
    case 'knitwear':
        $category = 'knitwear';
        $products = $product_class->get_all_new_arrivals_by_category($conn, $category);
        break;
    case 'accessories':
        $category = 'accessories';
        $products = $product_class->get_all_new_arrivals_by_category($conn, $category);
        break;
}


if (empty($_GET['feature']) && empty($_GET['product']) && isset($_GET['start_price']) && isset($_GET['end_price'])) {
    $products = $product_class->get_product_price_filter_new_arrivals($conn, $_GET['start_price'], $_GET['end_price']);
}