<?php
require 'includes/config_inc.php';
require 'classes/Connect.php';
require 'classes/UserInformation.php';

if(!isset($_SESSION['account_logged_in'])) {
    header('location: login.php');
    exit;
}

$db = new Connect();
$conn = $db->connect();

$user_information = new UserInformation();
$user = $user_information->getAddressInformation($conn);



?>




<?php require 'includes/header.php'; ?>

<?php require 'includes/nav.php'; ?>

<section class="dashboard-section">
    <div class="text-box">
        <p class="dashboard-text">Hello <?= $_SESSION['account_name'] ?>, we hope your day brings you joy and adventure...  </p>
        <h1 class="dashboard-heading">ACCOUNT DETAILS</h1>
        <br>
        <hr class="dashboard-divide">
    </div>

    <div class="dashboard-left">
        <ul>
            <li> <a href="dashboard.php">ACCOUNT DETAILS</a> </li>
            <li> <a href="">PIONEERS CLUB</a> </li>
            <li> <a href="">WISHLIST</a> </li>
            <li> <a href="">MY ORDERS</a> </li>
            <li> <a href="addressbook.php">ADDRESS BOOK</a> </li>
            <li> <a href="logout.php">LOGOUT</a> </li>
        </ul>
    </div>
    <div class="dashboard-right">
        <ul>
            <li> <i class="fa fa-user" aria-hidden="true"></i>
                <?= !empty($user['firstname']) ? $user['firstname'] : 'No Firstname provided'; ?>
                <?= !empty($user['lastname']) ? $user['lastname'] : 'No surname provided'; ?>
            </li>

            <li> <i class="fa fa-address-book" aria-hidden="true"></i>
                <?= !empty($user['address']) ? $user['address'] : 'No address provided'; ?>
            </li>

            <li><i class="fa fa-address-book" aria-hidden="true"></i>
                <?=  !empty($user['address2']) ? $user['address2'] : '';  ?>
            </li>

            <li> <i class="fa fa-building" aria-hidden="true"></i>
                <?= !empty($user['city']) ? $user['city'] : 'No City Provided'; ?>
                <?= !empty($user['postcode']) ? $user['postcode'] : 'No postcode provided'; ?>
            </li>

            <li> <i class="fa fa-envelope" aria-hidden="true"></i>
                <?= !empty($user['email']) ? $user['email'] : 'No email provided'; ?>
            </li>
            <li> <i class="fa fa-phone" aria-hidden="true"></i>
                <?= !empty($user['phone']) ? $user['phone'] : 'No phone provided'; ?>
            </li>
        </ul>

        <?php if ($user['address'] === null || $user['city'] === null ||
                  $user['postcode'] === null || $user['phone'] ===  null) : ?>
            <p class="information-text"> Go to <a href="addressbook.php">Address book</a> to complete your details. </p>
        <?php endif; ?>


    </div>


</section>

<!---->

<?php require 'includes/footer.php'; ?>




