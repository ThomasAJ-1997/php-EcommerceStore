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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];

    $errors = $user_information->validateAddressInformation();

    if (empty($errors)) {
        $user_information->updateAddressInformation($conn);
        header('location: dashboard.php');
        exit;
    }

    




}

?>

<style>
    .dashboard-section {
        height: 100vh;
        padding-top: 14rem;
    }

    .dashboard-left {
        font-weight: 300;
    }

    .feature-button {
        font-size: 2rem;
        padding: 10px 10px;
        border: none;
    }

    .feature-button:first-child {
        background-color: #0d54a6;
        color: #f8f9fa;
        font-weight: 600;
    }

    .feature-button:nth-child(2) {
        background-color: #ae0e0e;
        color: #f8f9fa;
        font-weight: 600;
    }

    .feature-button:last-child {
        background-color: #222222;
        color: #f8f9fa;
        font-weight: 600;
    }

    .feature-saved {
        background-color: green;
        color: #f8f9fa;
        font-weight: 600;
    }



    .error-messages {
        text-align: left;
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0.5rem 0;
        padding: 0.5rem;
        color: red;
    }

    .error-messages ul {
        list-style-type: none;
        padding: 0;
    }

    .error-messages li {
        margin: 0.5rem 0;
        color: red;
    }
    .error-messages li::before {
        content: "⚠️";
        margin-right: 0.5rem;
    }

    @media (max-width: 650px) {
        .address-block {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;

        }
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

    <div class="dashboard-left address-block">
        <ul>
            <li><?= $user['firstname']; ?> <?= $user['lastname']; ?> </li>
            <li><?= $user['address'] ?? 'Address: please edit' ?> </li>
            <li> <?= $user['address2'] ?> </li>
            <li> <?= $user['city'] ?? 'City: please edit' ?>  </li>
            <li> <?= $user['postcode'] ?? 'Postcode: please edit'; ?> </li>



            <li>
                <button class="feature-button feature-save"
                        onclick="document.getElementById('edit-address-form').style.display = 'block';">
                    Edit
                </button>
                <button class="feature-button"
                        onclick="if(confirm('Are you sure you want to delete this address?')) { window.location.href='data/delete_address.php?id=<?= $user['id']; ?>'; }">
                    Delete
                </button> <br> <br>
                <a href="dashboard.php" class="feature-button feature-back">
                   dashboard
                </a>
            </li>
        </ul>

        <?php if (!empty($errors)): ?>
            <div class="error-messages">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li class="error_message"><?= htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>


    </div>
    <div class="dashboard-right">

        <div class="form">
        <form id="edit-address-form" action="addressbook.php" method="POST"
              style="display: none; margin-top: 15px;">

            <div class="input-box">
            <input type="hidden" class="input-field" name="id" value="<?= $user['id']; ?>">

            </div>

            <div class="input-box">
                <label class="address-label" for="firstname">First Name:</label><br>
                <input disabled type="text" class="input-field" name="firstname" id="firstname"
                   value="<?= htmlspecialchars($user['firstname'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            </div>

            <div class="input-box">
            <label class="address-label" for="lastname">Last Name:</label><br>
            <input disabled type="text" class="input-field" name="lastname" id="lastname"
                   value="<?= htmlspecialchars($user['lastname'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            </div>

            <div class="input-box">
            <label class="address-label" for="address">Address:</label><br>
            <input type="text" class="input-field" name="address" id="address"
                   value="<?= htmlspecialchars($user['address'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            </div>

            <div class="input-box">
            <label class="address-label" for="address2">Address Line 2:</label><br>
            <input type="text" class="input-field" name="address2" id="address2"
                   value="<?= htmlspecialchars($user['address2'], ENT_QUOTES, 'UTF-8'); ?>"><br>
            </div>

            <div class="input-box">
            <label class="address-label" for="city">City:</label><br>
            <input type="text" class="input-field" name="city" id="city"
                   value="<?= htmlspecialchars($user['city'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            </div>

            <div class="input-box">
            <label class="address-label" for="postcode">Post Code:</label><br>
            <input type="text" class="input-field" name="postcode" id="postcode"
                   value="<?= htmlspecialchars($user['postcode'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            </div>

            <div class="input-box">
                <label class="address-label" for="phone">Phone:</label><br>
                <input type="tel" class="input-field" name="phone" id="phone"
                       value="<?= htmlspecialchars($user['phone'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            </div>

            <button type="submit" class="feature-button feature-saved">Save</button>
            <button type="button" class="feature-button"
                    onclick="document.getElementById('edit-address-form').style.display = 'none';">Cancel
            </button>
        </form>

        </div>
    </div>

</section>


<?php require 'includes/footer.php'; ?>


