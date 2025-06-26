<?php
require 'classes/Connect.php';
require 'includes/config_inc.php';
require 'classes/Validator.php';
require 'classes/Users.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Connect();
    $conn = $db->connect();

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //////////////////////////////////////////////////////////////////////
    // Validate input
    $validation = new Validator($firstname, $lastname, $email, $password);

    $errors = $validation->validate_account($conn);

    //////////////////////////////////////////////////////////////////////
    
    if (empty($errors)) {
        // Create User
        $user = new User($firstname, $lastname, $email, $hashed_password);
        $success = $user->create_user($conn);
        
    }
}

?>

<?php require 'includes/header.php'; ?>

<?php require 'includes/nav.php'; ?>


<section class="register">
    <div class="container-full">
       <div class="center">
        <h1 class="main-heading">Hello Pioneer</h1>
        <div class="description-container">
        <p class="description">Sign in and redeem points and access to exclusive deals.</p>
      
        <div class="form">
        <form action="register.php" method="post">

        
            <div class="input-box">
                <input type="email" name="email" class="input-field" placeholder="Email">
            </div>

            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password">
            </div>

            <div class="input-box">
                  <p class="forgot">Forgot Password? <a href="forgot.php">Click here</a> to reset your password.</p>
            </div>

    


            <?php if (!empty($success)): ?>
            <div class="success-messages">
                <ul>
                    <?php foreach ($success as $su): ?>
                        <li class="success_message"><?= htmlspecialchars($su); ?></li>
                    <?php endforeach; ?>
                </ul>
                </div>
            <?php endif; ?>


            <?php if (!empty($errors)): ?>
            <div class="error-messages">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li class="error_message"><?= htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
                </div>
            <?php endif; ?>

            <div class="input-submit">
                <button class="submit-btn" id="submit"></button>
                <label for="submit">Sign In</label>
            </div>
        </form>
      </div>
        <div class="container-text">
        <h2 class="secondary-heading">Don't have an account?</h2>
        <p class="forgot">Become a pioneer. <a href="register.php">Register here</a> </p>
        </div>
    </div>
    </div>


<?php require 'includes/carousel.php'; ?>

<?php require 'includes/footer.php'; ?>

<script src="https://kit.fontawesome.com/yourfontawesomekit.js" crossorigin="anonymous"></script>