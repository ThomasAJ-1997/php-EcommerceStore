<?php

/**
 * Represents a user account with personal and communication details.
 *
 * This class contains properties to store the user's first name, last name,
 * email address, and data structures for handling errors and messages related
 * to the account operations.
 */
class Validator
{
    public PDO $conn;
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public array $errors;


    /**
     * Constructor to initialize the object with user details.
     *
     * @param  string  $firstname  The first name of the user.
     * @param  string  $lastname  The last name of the user.
     * @param  string  $email  The email address of the user.
     * @param  string  $password  The password of the user.
     * @return void
     */
    public function __construct(string $firstname, string $lastname, string $email, string $password )
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->errors = [];
        $this->success = [];

    }

    /**
     * Validates the account details.
     *
     * This method checks if the first name and last name are not empty,
     * if the email format is valid, if the email already exists in the database,
     * and if the password meets security requirements.
     *
     * @param  PDO  $conn  The database connection object.
     * @return array  An array of error messages, if any.
     */

    public function validate_account($conn): array 
    {
         if (empty($this->firstname) || empty($this->lastname)) {
        $this->errors[] = "First name and last name are required.";
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/", $this->firstname)
    || !preg_match("/^[a-zA-Z-' ]*$/", $this->lastname)) {
        $this->errors[] = "Only letters and white space allowed in name.";
    }

    if (!preg_match("/^[^@]+@[^@]+\.[a-z]{2,6}$/i", $this->email)) {
        $this->errors[] = "Invalid email format.";
    }

    $existing_user = $this->existing_user($conn);

    if ($existing_user) {
        $this->errors[] = "Email already exists. Please use a different email.";
    }

    if (strlen($this->password) < 8) {
        $this->errors[] = "Password must be at least 8 characters long.";
    }

    if (!preg_match("/[A-Z]/", $this->password) || 
        !preg_match("/[a-z]/", $this->password) || 
        !preg_match("/[0-9]/", $this->password) || 
        !preg_match("/[\W_]/", $this->password)) {
        $this->errors[] = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }

    return $this->errors;
    }

    /**
     * Checks if the user already exists in the database.
     *
     * This method queries the database to see if a user with the given email
     * already exists.
     *
     * @param  PDO  $conn  The database connection object.
     * @return array|false  Returns the existing user data if found, otherwise false.
     */
    protected function existing_user($conn) 
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $existing_user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $existing_user;
    }
}