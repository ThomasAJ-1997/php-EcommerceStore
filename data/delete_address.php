<?php
require '../includes/config_inc.php';
require '../classes/Connect.php';

$db = new connect();
$conn = $db->connect();


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = intval($_GET['id']);
    $stmt = $conn->prepare("UPDATE user_address SET address = NULL, address2 = NULL, city = NULL, postcode = NULL, phone = NULL WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    if ($stmt->execute()) {
        header('location: ../dashboard.php');
    } else {
        echo "Failed to delete user address information.";
    }
} else {
    echo "Invalid user ID.";
}

