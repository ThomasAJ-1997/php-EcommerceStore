<?php
require 'includes/config_inc.php';


if(!isset($_SESSION['account_logged_in'])) {
    header('location: login.php');
    exit;
}
?>


<?php echo 'testing dashboard'; ?>