<?php

class UserInformation
{


 public function getAddressInformation($conn)
 {
     $sql = "SELECT users.id, users.firstname, users.lastname, users.email, 
       user_address.address, user_address.address2, user_address.city, 
        user_address.postcode, user_address.phone, user_address.default_address
        FROM users
        INNER JOIN user_address 
        ON users.id = user_address.user_id 
        WHERE users.id = :id";

     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':id', $_SESSION['account_id']);
     $stmt->execute();
     return $stmt->fetch(PDO::FETCH_ASSOC);

 }
}