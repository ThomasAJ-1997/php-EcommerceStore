<?php
require 'sys/Connect.php';

$db = new Connect();
$conn = $db->connect();
?>

<?php require 'includes/header.php'; ?>

<?php require 'includes/nav.php'; ?>

<section class="register">
    <div class="container-full">
    <div class="center">
        <h1 class="main-heading">Join the pioneers club</h1>
        <div class="description-container">
        <p class="description">Sign up today and join the movement</p> <br>
        <p class="description">Become part of our community where you earn points every time you shop &
        redeem points for discounts, savings and exclusive member only benefits. So? What are you waiting for...
            <br> <br> <strong>... Join the club!</strong></p>
        </div>

    <div class="form">
        <form action="" method="">

            <div class="input-box">
                <input type="text" name="firstname" class="input-field" placeholder="First Name">
            </div>

            <div class="input-box">
                <input type="text" name="lastname" class="input-field" placeholder="Last Name">
            </div>

            <div class="input-box">
                <input type="email" name="email" class="input-field" placeholder="Email">
            </div>

            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password">
            </div>

            <div class="input-submit">
                <button class="submit-btn" id="submit"></button>
                <label for="submit">Sign Up</label>
            </div>
        </form>
    </div>
        <div class="container-text">
        <h2 class="secondary-heading">Already have an account?</h2>
        <p class="forgot">Already a SONS member? <a href="">Sign in here</a> </p>
        </div>


    </div>
    </div>
</section>

<?php require 'includes/footer.php'; ?>


<script src="js/hamburger.js"></script>
<script src="https://kit.fontawesome.com/yourfontawesomekit.js" crossorigin="anonymous"></script>