<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="<?= Utility::getAppURL() ?>assets/css/style.css">
</head>
<body>
    <div class="container register-form-container">
        <form id="registration-form" action="<?= Utility::getAppURL() ?>index.php/register" method="POST">
            <h3>User Registration</h3>
            <?php
                if (isset($_SESSION['success'])) {
                    ?>
                    <p class="success"><?php echo $_SESSION['success']; ?></p>
                    <?php
                    unset($_SESSION['success']);
                }
            ?>
            <?php
                if (isset($_SESSION['errors'])) {
                    foreach ($_SESSION['errors'] as $error) {
            ?>
            <p class="errors"><?php echo $error; ?></p>
            <?php
                    }
                    unset($_SESSION['errors']);
                }
            ?>
            <div class="input">
                <label>Email <span class="required-field">*</span></label>
                <input type="email" name="email" id="email" required/>
            </div>
            <div class="input">
                <label>Username <span class="required-field">*</span></label>
                <input type="text" name="username" id="username" required/>
            </div>
            <div class="input">
                <label>Password <span class="required-field">*</span></label>
                <input type="password" name="password" id="password" minlength="6" required/>
            </div>
            <div class="input">
                <label>Confirm Password <span class="required-field">*</span></label>
                <input type="password" name="confirm-password" id="confirm-password" minlength="6" required/>
            </div>
            <div class="input">
                <button type="submit">Register</button>
            </div>
            <div class="input">
                Already have a account ?<a href="<?= Utility::getAppURL() ?>index.php/login"> Click here.</a>
            </div>
        </form>
    </div>
    <script src="<?= Utility::getAppURL() ?>assets/js/script.js"></script>
</body>
</html>
