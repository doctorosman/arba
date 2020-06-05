<?php require_once '../../src/php/functions.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=4, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/reset.css">
    <link rel="stylesheet" href="../../src/css/login.css">
    <script src="https://kit.fontawesome.com/48ea00b0ca.js" crossorigin="anonymous"></script>
    <title><?php echo SITE_NAME; ?></title>
</head>
<body>
    <div class="container">
        <div class="login">
            <div class="title">Kullanıcı Girişi</div>
            <form method="POST">
            <div class="field">
                <span>
                <i class="fas fa-user fa-sm"></i>
                <input type="text" class="username" name="kadi" placeholder="Kullanıcı adı">
                </span>
            </div>
            <div class="field">
                <span>
                    <i class="fas fa-key fa-sm"></i>
                    <input type="password" class="password" name="sifre" placeholder="Şifre">
                </span>
            </div>
            <div class="button field">
                <input type="submit" value="Giriş Yap" name="giris" id="abutton">
            </div>
            <a href="../register">Kayıt Ol</a>
            </form>
        </div>
    </div>
    <div class="error">
        <br>
        <?php
            if ($_POST) {
                if ($_POST['kadi'] != "" && $_POST['sifre'] != "") {
                    if (login($_POST['kadi'], $_POST['sifre'])){
                        header('Location: ../../');
                    }else {
                        echo 'Kullanıcı adınız veya şifreniz yanlış';
                    }
                }
            }
        ?>
    </div>
</body>
</html>