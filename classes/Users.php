<?php 

class User
{
    public PDO $conn;
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $hashed_password;

    public array $success;

    public function __construct(string $firstname, string $lastname, string $email, string $hashed_password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->hashed_password = $hashed_password;
        $this->success = [];
    }

    public function create_user($conn)
    {
        $sql = "INSERT INTO users(firstname, lastname, email, password, active)
                VALUES(:firstname, :lastname, :email, :password, :active)";
            
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email , PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->hashed_password, PDO::PARAM_STR);
        $stmt->bindValue(':active', 1, PDO::PARAM_INT);

        $stmt->execute();
        $this->success[] = "User created successfully.";
        return $this->success;
    
    }

}

