<?php
    require_once 'db.php';
    require_once 'settings.php';

    session_start();
    ob_start();

    class User {

        private $username;
        private $money;

        public function __construct($username, $money){
            $this->username = $username;
            $this->money = $money;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getMoney() {
            return $this->money;
        }

    }

    function register($username, $email, $password) {
        global $db;
        $q = $db->prepare("INSERT INTO uyeler SET kadi = ?, sifre = ?, eposta = ?");
        $do = $q->execute(array($username, $password, $email));

        if ($do){
            return true;
        }else {
            return $do;
        }
    }

    function login($username, $password) {
        global $db;
        $q = $db->query("SELECT * FROM uyeler WHERE kadi = '$username' AND sifre = '$password'")->fetch(PDO::FETCH_ASSOC);

        if ($q) {
            $_SESSION['logged'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            return true;
        }else {
            return false;
        }
    }

    function checkLogged() {
        return isset($_SESSION['logged']);
    }

    function getCurrent() {
        global $db;
        $u = $_SESSION['username'];
        $s = $db->query("SELECT * FROM uyeler WHERE kadi = '$u'")->fetch(PDO::FETCH_ASSOC);
        return new User($s['kadi'], $s['para']);
    }
?>