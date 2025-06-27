<?php

require 'classes/Connect.php';
require 'classes/Users.php';
require 'classes/Token.php';


?>

<?php require 'includes/header.php'; ?>

    <div class="container-full">
        <div class="center">
            <?php if (!empty($errors)) : ?>
                <div class="error-messages">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <h1 class="secondary-heading">Successfully reset password</h1>
                <a class="forgot" href="login.php">Back to login</a>
            <?php endif; ?>
        </div>
    </div>

<?php require 'includes/footer.php'; ?>