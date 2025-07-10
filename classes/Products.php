<?php

class Products
{
    private PDO $conn;
    public function all_products($conn): array
    {
        $sql = "SELECT
                p.product_id,
                pi.product_item_id,
                p.product_name,
                pi.original_price,
                pi.sale_price,
                pi.product_front_image
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id;"
        ;

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_product_price_filter($conn, $start_price, $end_price)
    {
        $starting_price_filter = $start_price;
        $ending_price_filter = $end_price;

        $sql = "SELECT 
                p.product_id,
                p.product_name,
                pi.product_item_id,
                pi.product_front_image,
                pi.original_price
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




}