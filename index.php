<?php
    require_once 'src/php/functions.php';

    if (!checkLogged()){
        header('Location: p/login');
    }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/main.css">
    <script src="https://kit.fontawesome.com/48ea00b0ca.js" crossorigin="anonymous"></script>
    <title><?php echo SITE_NAME; ?></title>
</head>
<body>
    <div class="top">
        <div class="field">
            <img src="src/img/coin.png">
            <?php echo getCurrent()->getMoney(); ?>
        </div>
    </div>
    <div class="menu">
        <div class="item">
            <a href=""><i class="fas fa-gamepad"></i>
            OYUNA GİR</a>
        </div>
    </div>
</body>
</html>