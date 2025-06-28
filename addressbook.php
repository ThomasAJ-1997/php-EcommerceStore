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

<style>
    .dashboard-section {
        height: 100vh;
        padding-top: 14rem;
    }

    .dashboard-left .default_address {
        font-weight: 300;
    }

    .feature-button {
        font-size: 2rem;
        padding: 10px 10px;
    }

</style>

<?php require 'includes/header.php'; ?>

<?php require 'includes/nav.php'; ?>


<section class="dashboard-section">
    <div class="text-box">
        <h1 class="dashboard-heading">ADDRESS BOOK</h1>
        <br>
        <hr class="dashboard-divide">
    </div>

    <div class="dashboard-left">
        <ul>
            <li><?= $user['firstname']; ?> <?= $user['lastname']; ?> </li>
            <li><?= $user['address'] ?> </li>
            <li> <?= $user['address2'] ?> </li>
            <li> <?= $user['city'] ?>  </li>
            <li> <?= $user['postcode']; ?> </li>
            <li class="default_address"> <?= $user['default_address'] == 1 ? '(default Address)' : ''; ?> </li>


            <li>
                <button class="feature-button" onclick="window.location.href='edit_address.php?id=<?= $user['id']; ?>'">
                    Edit
                </button>
                <button class="feature-button"
                        onclick="if(confirm('Are you sure you want to delete this address?')) { window.location.href='delete_address.php?id=<?= $user['id']; ?>'; }">
                    Delete
                </button>
            </li>


        </ul>
    </div>
    <div class="dashboard-right">

</section>


<?php require 'includes/footer.php'; ?>


