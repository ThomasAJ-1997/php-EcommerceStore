<?php
require 'classes/Connect.php';
require 'classes/Users.php';
require 'classes/Token.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $token = $_POST['token'];

    $token_hash = hash("sha256", $token);

    $db = new Connect();
    $conn = $db->connect();

    $new_token = new Token();
    $user = $new_token->tokenHash($conn, $token_hash);

    if ($user === null) {
        die('Error: Token not found');
    }

    if (strtotime($user['reset_token_expires_at']) <= time()) {
        die('Error: Your password reset token has expired');
    }

    if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])(?=.*[A-Z])(?=.*[a-z])(?=.*[ !#$%&'\(\) * +,-.\/[\\] ^ _`{|}~\"])[0-9A-Za-z !#$%&'\(\) * +,-.\/[\\] ^ _`{|}~\"]{8,50}$/",
        $_POST['password'])) {
        $errors[] = 'Make sure password contains: 1 digit, 1 capital, 1 lower, and 1 special character';
    }

    if (strlen(trim($_POST['password'])) < 8) {
        $errors[] = 'Password needs to be more than eight characters';
    }

    if ($_POST['password'] !== $_POST['password_confirmation']) {
        $errors[] = 'Passwords must match';
    }

    if (empty($errors)) {
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $token_reset = $new_token->resetToken($conn, $hashed_password, $user);
        header("Location: process_reset_password.php");
        exit();
    }
}

?>

<?php require 'includes/header.php'; ?>

    <section class="register">
        <div class="forgot-container">
            <div class="center">
                <h1 class="tertiary-heading">Create new password</h1>

                <div class="form margin-spacing">
                    <form action="reset_password.php?token=<?=htmlspecialchars($_GET['token'])?>" method="post">

                        <div class="input-box">
                            <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']); ?>">
                        </div>

                        <div class="input-box">
                            <input type="password" name="password" class="input-field" placeholder="New Password" autocomplete="off">
                        </div>

                        <div class="input-box">
                            <input type="password" name="password_confirmation" class="input-field" placeholder="Confirm Password" autocomplete="off">
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

                        <div class="input-submit margin">
                            <button class="submit-btn" id="submit"></button>
                            <label for="submit">Submit</label>
                        </div>
                    </form>
                </div>
                <br> <br> <br>
            </div>



<?php require 'includes/footer.php'; ?>