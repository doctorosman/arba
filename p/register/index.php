<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=4, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/reset.css">
    <link rel="stylesheet" href="../../src/css/login.css">
    <script src="https://kit.fontawesome.com/48ea00b0ca.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title><?php require_once '../../src/php/functions.php'; echo SITE_NAME; require_once '../../secret.php'; ?></title>
    <style>.login{ margin-top: -25px}</style>
</head>
<body>
    <div class="container">
        <div class="login">
            <div class="title">Kullanıcı Girişi</div>
            <form method="POST">
            <div class="field">
                <span>
                    <i class="fas fa-user fa-sm"></i>
                    <input type="text" name="kadi" placeholder="Kullanıcı adı">
                </span>
            </div>
            <div class="field">
                <span>
                    <i class="fas fa-key fa-sm"></i>
                    <input type="password" name="sifre" placeholder="Şifre">
                </span>
            </div>
            <div class="field">
                <span>
                    <i class="fas fa-envelope fa-sm"></i>
                    <input type="email" name="eposta" placeholder="E-posta">
                </span>
            </div>
            <div class="g-recaptcha" data-sitekey=<?php echo '"'.SITE_KEY.'"'; ?>></div>
            <div class="button field">
                <input type="submit" value="Kayıt Ol" name="giris" id="abutton">
            </div>
            <a href="../login">Giriş Yap</a><br>
            </form>
        </div>
    </div>
    <div class="error"><br>
                <?php

        if ($_POST) {
            if ($_POST['kadi'] != "" && $_POST['sifre'] != "" && $_POST['eposta'] != "") {
                if (isset($_POST['g-recaptcha-response'])){
                    $captcha = $_POST['g-recaptcha-response'];
                }

                $secretKey = SECRET_KEY;
                $ip = $_SERVER['REMOTE_ADDR'];
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
                $responseKeys = json_decode($response, true);

                if (!$captcha) {
                    echo 'Lütfen robot değilim kısmını işaretleyin!';
                }else {
                    if (intval($responseKeys["success"]) !== 1) {
                        echo 'SPAM mısın? Tekrar kontrol et.';
                    }else {
                        if(register($_POST['kadi'], $_POST['eposta'], $_POST['sifre'])) {
                            header('Location: ../login');
                        }
                    }
                }
            }else {
                echo 'Boş alan bırakmayın';
            }
        }
    ?>
                </div>
</body>
</html>