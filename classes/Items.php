<?php

class Items
{
    private PDO $conn;
    public function all_items($conn): array
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
}