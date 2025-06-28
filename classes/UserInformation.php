<?php

class UserInformation
{

    public array $errors;


    public function getAddressInformation($conn)
    {
        $sql = "SELECT users.id, users.firstname, users.lastname, users.email, 
       user_address.address, user_address.address2, user_address.city, 
        user_address.postcode, user_address.phone
        FROM users
        INNER JOIN user_address 
        ON users.id = user_address.user_id 
        WHERE users.id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $_SESSION['account_id']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function updateAddressInformation($conn)
    {
     $sql = "UPDATE user_address 
        SET address = :address, 
            address2 = :address2,
            city = :city,
            postcode = :postcode,
            phone = :phone
            WHERE user_id = :user_id";


     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
     $stmt->bindParam(':address2', $_POST['address2'], PDO::PARAM_STR);
     $stmt->bindParam(':city', $_POST['city'], PDO::PARAM_STR);
     $stmt->bindParam(':postcode', $_POST['postcode'], PDO::PARAM_STR);
     $stmt->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
     $stmt->bindParam(':user_id', $_POST['id'], PDO::PARAM_INT);

     return $stmt->execute();

 }

 public function validateAddressInformation(): array
 {
     $errors = [];

     if (empty($_POST['address']) || !preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['address'])) {
         $errors[] = "Address is invalid";
     }


     if (!empty($_POST['address2']) && !preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['address2'])) {
         $errors[] = "Address Line 2 is invalid";
     }


     if (empty($_POST['city']) || !preg_match('/^[a-zA-Z\s]+$/', $_POST['city'])) {
         $errors[] = "City is invalid";
     }

     if (empty($_POST['postcode']) || !preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['postcode'])) {
         $errors[] = "Postcode is invalid";
     } else {
         $_POST['postcode'] = strtoupper($_POST['postcode']);
     }

     if (!empty($_POST['phone']) && !preg_match('/^\d{12}$/', $_POST['phone'])) {
         $errors[] = "Phone number must be exactly 12 digits";
     }

     return $errors;
 }
}