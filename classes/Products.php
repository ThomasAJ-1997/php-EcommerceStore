<?php

/**
 * Class Products
 * Responsible for managing product data and applying various filtering options such as price range,
 * alphabetical order, price sorting, bestselling, and new arrivals.
 */
class Products
{
    private PDO $conn;
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/// FEATURES FILTER CONTROL

    /**
     * Retrieves all products from the database where the original price falls within the specified range.
     *
     * @param  PDO  $conn  The database connection object.
     * @param  int|null  $start_price  The starting price for the filter range.
     * @param int|null  $end_price  The ending price for the filter range.
     * @return array An array of products matching the price range criteria, including product details such as product ID, item ID, name, original price, sale price, and front image.
     */
    public function all_products($conn, int|null $start_price, int|null $end_price): array
    {
        $starting_price_filter = $start_price;
        $ending_price_filter = $end_price;

        $sql = "SELECT
                p.product_id,
                pi.product_item_id,
                p.product_name,
                pi.original_price,
                pi.sale_price,
                pi.product_front_image
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id;
                WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * Retrieves products from the database where the original price falls within the specified range and orders them alphabetically by product name.
     *
     * @param  PDO  $conn  The database connection object.
     * @return array An array of products matching the price range criteria, sorted in alphabetical order by product name. Includes product details such as product ID, name, item ID, front image, and original price.
     */
    public function get_product_alphabetical_order($conn): array
    {
        $starting_price_filter = $_GET['start_price'];
        $ending_price_filter = $_GET['end_price'];


        $sql = "SELECT
                p.product_id, 
                p.product_name,
                pi.product_item_id,
                pi.product_front_image,
                pi.original_price
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter
                ORDER BY p.product_name ASC;";


        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves all products from the database where the original price falls within a specified range,
     * sorted in ascending order by their original price.
     *
     * @param  PDO  $conn  The database connection object.
     * @return array An array of products matching the price range criteria, including product ID, name, item ID, front image, and original price.
     */
    public function get_product_price_low_to_high($conn): array
    {
        $starting_price_filter = $_GET['start_price'];
        $ending_price_filter = $_GET['end_price'];

        $sql = "SELECT
                p.product_id, 
                p.product_name,
                pi.product_item_id,
                pi.product_front_image,
                pi.original_price
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter
                ORDER BY pi.original_price ASC;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a list of products sorted by price in descending order within a specified price range.
     *
     * @param  PDO  $conn  The database connection object used to execute the query.
     *
     * @return array Returns an array of products that match the price range filter, sorted by price in descending order.
     */
    public function get_product_price_high_to_low($conn): array
    {
        $starting_price_filter = $_GET['start_price'];
        $ending_price_filter = $_GET['end_price'];


        $sql = "SELECT
                p.product_id, 
                p.product_name,
                pi.product_item_id,
                pi.product_front_image,
                pi.original_price
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter
                ORDER BY pi.original_price DESC;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a list of products within a specified price range, sorted by the number of products sold in descending order.
     *
     * @param  PDO  $conn  The database connection object used to execute the query.
     *
     * @return array Returns an array of products that match the price range filter, sorted by bestselling order.
     */
    public function get_product_by_bestselling($conn): array
    {
        $starting_price_filter = $_GET['start_price'];
        $ending_price_filter = $_GET['end_price'];

        $sql = "SELECT
                p.product_id,
                p.product_name,
                pi.product_item_id,
                pi.product_front_image, 
                pi.original_price,
                pi.product_sold
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter
                ORDER BY pi.product_sold DESC;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_product_by_new_arrivals($conn): array
    {
        $starting_price_filter = $_GET['start_price'];
        $ending_price_filter = $_GET['end_price'];

        $sql = "SELECT
                p.product_id,
                p.product_name,
                pi.product_item_id,
                pi.product_front_image, 
                pi.original_price,
                pi.product_release_date
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter
                ORDER BY pi.product_release_date DESC";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    /// PRICE FILTERING

    /**
     * Retrieves a list of products within a specified price range.
     *
     * @param  PDO  $conn  The database connection object used to execute the query.
     * @param  float  $start_price  The starting price for filtering products.
     * @param  float  $end_price  The ending price for filtering products.
     *
     * @return array Returns an array of products that match the specified price range.
     */
    public function get_product_price_filter(PDO $conn, float $start_price, float $end_price): array
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

    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    /// PRODUCT FILTERING
    /**
     * Retrieves a list of products that belong to a specified category and are within a specified price range.
     *
     * @param  PDO  $conn  The database connection object used to execute the query.
     * @param  string  $category  The category name used to filter the products.
     *
     * @return array Returns an array of products filtered by the specified category and price range.
     */
    public function get_all_products_by_category($conn, string $category): array
    {
        $starting_price_filter = $_GET['start_price'];
        $ending_price_filter = $_GET['end_price'];

        $sql = "SELECT 
                pi.product_id,
                p.product_name,
                pi.product_item_id,
                pc.product_category_id,
                pc.category_name,
                pi.product_front_image,
                pi.original_price,
                pi.product_release_date
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                INNER JOIN product_category pc ON p.product_category_id = pc.product_category_id
                WHERE category_name LIKE '%$category%'
                AND original_price BETWEEN $starting_price_filter AND $ending_price_filter;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    /// LANDING PAGE

    public function product_new_arrivals($conn)
    {
        $sql = "SELECT
                p.product_id,
                p.product_name,
                pi.product_item_id,
                pi.product_front_image, 
                pi.original_price,
                pi.product_release_date
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                ORDER BY pi.product_release_date DESC
                LIMIT 4";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function product_bestsellers($conn)
    {
        $sql = "SELECT
                p.product_id,
                p.product_name,
                pi.product_item_id,
                pi.product_front_image, 
                pi.original_price,
                pi.product_sold
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                ORDER BY pi.product_sold DESC
                LIMIT 4";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    /// NEW ARRIVALS (LIMIT) SECTION

    public function get_product_by_most_newest_arrivals($conn, int|null $start_price, int|null $end_price): array
    {
        $starting_price_filter = $start_price ?? 0;
        $ending_price_filter = $end_price ?? PHP_INT_MAX;

        $sql = "SELECT 
                p.product_id,
                p.product_name,
                pi.product_item_id,
                pi.product_front_image,
                pi.original_price,
                pi.product_release_date
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                WHERE original_price BETWEEN :start_price AND :end_price 
                ORDER BY product_release_date DESC
                LIMIT 20";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':start_price', $starting_price_filter, PDO::PARAM_INT);
        $stmt->bindParam(':end_price', $ending_price_filter, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_product_price_filter_new_arrivals(PDO $conn, int|null $start_price, int|null $end_price): array
        {
            $starting_price_filter = $start_price;
            $ending_price_filter = $end_price;

            $sql = "SELECT 
                    p.product_id,
                    p.product_name,
                    pi.product_item_id,
                    pi.product_front_image,
                    pi.original_price,
                    pi.product_release_date
                    FROM product_item pi
                    INNER JOIN product p ON pi.product_id = p.product_id
                    WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter 
                    ORDER BY product_release_date DESC
                    LIMIT 20";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    public function get_all_new_arrivals_by_category($conn, string $category): array
    {
        $starting_price_filter = $_GET['start_price'];
        $ending_price_filter = $_GET['end_price'];

        $sql = "SELECT 
                pi.product_id,
                p.product_name,
                pi.product_item_id,
                pc.product_category_id,
                pc.category_name,
                pi.product_front_image,
                pi.original_price,
                pi.product_release_date
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                INNER JOIN product_category pc ON p.product_category_id = pc.product_category_id
                WHERE category_name LIKE '%$category%'
                AND original_price BETWEEN $starting_price_filter AND $ending_price_filter
                ORDER BY product_release_date DESC
                LIMIT 20";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

    public function get_new_arrivals_by_bestseller($conn): array
    {
        $starting_price_filter = $_GET['start_price'];
        $ending_price_filter = $_GET['end_price'];

        $sql = "SELECT
                pi.product_id,
                p.product_name,
                pi.product_item_id,
                pi.product_front_image,
                pi.original_price,
                pi.product_sold,
                pi.product_release_date
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter
                ORDER BY pi.product_sold DESC
                LIMIT 20";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_new_arrivals_by_alphabetical_order($conn): array
    {
        $starting_price_filter = $_GET['start_price'];
        $ending_price_filter = $_GET['end_price'];

        $sql = "SELECT
                pi.product_id,
                p.product_name,
                pi.product_item_id,
                pi.product_front_image,
                pi.original_price,
                pi.product_sold,
                pi.product_release_date
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter
                ORDER BY p.product_name DESC
                LIMIT 20";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_new_arrivals_by_price_low_to_high($conn): array
    {
        $starting_price_filter = $_GET['start_price'];
        $ending_price_filter = $_GET['end_price'];

        $sql = "SELECT
                pi.product_id,
                p.product_name,
                pi.product_item_id,
                pi.product_front_image,
                pi.original_price,
                pi.product_sold,
                pi.product_release_date
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter
                ORDER BY pi.original_price ASC
                LIMIT 10";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_new_arrivals_by_price_high_to_low($conn): array
    {
        $starting_price_filter = $_GET['start_price'];
        $ending_price_filter = $_GET['end_price'];

        $sql = "SELECT
                pi.product_id,
                p.product_name,
                pi.product_item_id,
                pi.product_front_image,
                pi.original_price,
                pi.product_sold,
                pi.product_release_date
                FROM product_item pi
                INNER JOIN product p ON pi.product_id = p.product_id
                WHERE original_price BETWEEN $starting_price_filter AND $ending_price_filter
                ORDER BY pi.original_price DESC;
                LIMIT 10";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }







}