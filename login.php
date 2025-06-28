<?php

require 'includes/config_inc.php';

require 'classes/Cookies.php';
require 'classes/Connect.php';
require 'classes/Validator.php';
require 'classes/Users.php';

if(isset($_SESSION['account_logged_in'])) {
    header('location: dashboard.php');
    exit;
}

$is_invalid = false;

$id = '';
$firstname = '';
$lastname = '';
$email = '';
$password = '';
$remember = '';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Connect();
    $conn = $db->connect();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //////////////////////////////////////////////////////////////////////
    // Validate input
    $user = new User($firstname, $lastname, $email, $password);
    $log_in = $user->getAccountEmail($conn, $email);

    $cookies = new Cookies($remember, $email);
    $remember = $cookies->checkCookies();

    if (empty($email) || empty($password)) {
        $errors[] = 'Please fill both username and password fields';
    }

    if ($log_in) {
        if(password_verify($password, $log_in['password'])) {

            session_regenerate_id();
            $_SESSION['account_logged_in'] = TRUE;
            $_SESSION['account_name'] = $log_in['firstname'];
            $_SESSION['account_id'] = $log_in['id'];

            header('location: dashboard.php');
            exit;
        } else {
            $errors[] = 'Email and/or password is invalid, please try again';
        }


    } else {
        $errors[] = 'Email and/or password is invalid, please try again';
    }


} $is_invalid = true;


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
        <form action="login.php" method="post">

        
            <div class="input-box">
                <input type="email" name="email" class="input-field" placeholder="Email"
                value="<?php if(!empty($email)) { echo $email; } elseif (isset($_COOKIE['remember_email'])) { echo $_COOKIE['remember_email']; } ?>">
            </div>

            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password">
            </div>

            <div class="input-box">
                <div>
                    <input name="remember" type="checkbox" id="check">
                    <label for="check">Remember Me </label>
                </div>
                <br>
                <div>
                  <p class="forgot">Forgot Password? <a href="forgot.php">Click here</a> to reset your password.</p>
                </div>
            </div>

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

