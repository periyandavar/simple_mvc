<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="<?= Utility::getAppURL() ?>assets/css/style.css">
</head>
<body>
    <div class="container login-form-container">
        <form id="login-form" action="<?= Utility::getAppURL() ?>index.php/login" method="POST">
            <h3>User Login</h3>
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
                <label>Username <span class="required-field">*</span></label>
                <input type="text" name="username" required/>
            </div>
            <div class="input">
                <label>Password <span class="required-field">*</span></label>
                <input type="password" name="password" required/>
            </div>
            <div class="input">
                <button type="submit">Login</button>
            </div>
            <div class="input">
                Don't have a account ?<a href="<?= Utility::getAppURL() ?>index.php/register"> Click here.</a>
            </div>
        </form>
    </div>
</body>
</html>
