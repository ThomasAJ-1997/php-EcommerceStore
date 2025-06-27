<?php

/**
 * Class Token handles operations related to token management, such as
 * retrieving information using a token hash and resetting user tokens.
 */
class Token
{
    public array $errors;
    /**
     * Fetches customer data based on the provided token hash.
     *
     * @param  PDO  $conn  The database connection object.
     * @param  string  $token_hash  The hash of the reset token to search for.
     * @return array|false The customer data as an associative array, or false if no match is found.
     */
    public function tokenHash($conn, string $token_hash): false|array
    {
        $sql = "SELECT * FROM users 
        WHERE reset_token_hash = :token_hash";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":token_hash", $token_hash, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    /**
     * Resets the token for a specified user by updating the password
     * and clearing the reset token hash and its expiration time in the database.
     *
     * @param  PDO  $conn  The database connection object.
     * @param  string  $hashed_password  The new hashed password for the user.
     * @param  array  $user  An associative array containing user details, including the user ID.
     * @return string A confirmation message indicating the password update was successful.
     */
    public function resetToken(PDO $conn, string $hashed_password, array $user): string
    {
        $sql = "UPDATE users
             SET password = :password, 
                 reset_token_hash = NULL, 
                 reset_token_expires_at = NULL
            WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":password", $hashed_password, PDO::PARAM_STR);
        $stmt->bindParam(":id", $user['id'], PDO::PARAM_INT);

        $stmt->execute();

        return "Password updated. You can now sign in.";
    }

    public function password_reset_check()
    {


        if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])(?=.*[A-Z])(?=.*[a-z])(?=.*[ !#$%&'\(\) * +,-.\/[\\] ^ _`{|}~\"])[0-9A-Za-z !#$%&'\(\) * +,-.\/[\\] ^ _`{|}~\"]{8,50}$/", $_POST['password'])) {
            $errors[] = 'Make sure password contains: 1 digit, 1 capital, 1 lower and 1 special character';
            // Checks for:
            // 1 digit / 1 Capital / 1 lower / 1 special

        }

        if (strlen(trim($_POST['password'])) < 8) {
            $errors[] = 'Password needs to be more than eight characters';
            die();

        }

        if ($_POST['password'] !== $_POST['password_confirmation']) {
            $errors[] = 'Passwords much match';
        }

        return $errors;



    }

}