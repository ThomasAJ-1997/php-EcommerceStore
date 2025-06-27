<?php
require 'includes/config_inc.php';

?>

<?php require 'includes/header.php'; ?>

<section class="register">
    <div class="forgot-container">
        <div class="center">
            <h1 class="tertiary-heading">Forgot Password</h1>

                <div class="form margin-spacing">
                    <form action="includes/reset-password/send-password-reset.php" method="post">


                        <div class="input-box">
                            <input type="email" name="email" class="input-field" placeholder="Email">
                        </div>

                        <div class="input-submit margin">
                            <button class="submit-btn" id="submit"></button>
                            <label for="submit">Reset Password</label>
                        </div>
                    </form>
                </div>
            <br> <br> <br>
        </div>



        <?php require 'includes/footer.php'; ?>

