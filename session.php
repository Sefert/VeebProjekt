<?php
if(!isset($_SESSION)){
    session_start();
}

//if (session_status() !== PHP_SESSION_ACTIVE) {
//    session_start();
//}
require_once ('db/Database.php');
if (!isset($_COOKIE["galerii"])) {
    setcookie("galerii",$_POST['mail'], time() + 60);
    if (isset($_POST['Register'])){
//        $_SESSION['firstname'][count($_SESSION)] = $_POST['forname'];
        $fname = htmlspecialchars($_POST['forname']);
        $lname = htmlspecialchars($_POST['surname']);
        $password = htmlspecialchars($_POST['password']);
        $mail = htmlspecialchars($_POST['mail']);
        $register=new Database();
        $register->_setReg($fname,$lname,$password,$mail);
        $folder = new Database();
        $folder->_setMail($mail);
        $folder = $folder->_getFolder();
        $_SESSION[$mail]=array($fname, $lname, $mail,$folder,time(),time()+60);
//        var_dump($register);
//        if (isset($_SESSION[$mail]))
//            header('http://enos.itcollege.ee/~mmozniko/test/index.php?page=galerii');
    } elseif (isset($_POST['Login'])){
        $password = htmlspecialchars($_POST['password']);
        $mail = htmlspecialchars($_POST['mail']);
        $login = new Database();
        $login->_setIdentify($mail, $password);
        $login = $login->_getIdentify();
//        print_r($login);
//        echo $login["Eesnimi"];
//        echo $mail;
//        foreach ($login as $key=>$value)
//            print $key."=>".$value;
        $_SESSION[$mail]=array($login['Eesnimi'], $login['Perenimi'], $mail, $login['Kataloog'], time(),time()+60);
//        print_r($_SESSION[$mail]);
//        if (isset($_SESSION[$mail]))
//            header('http://enos.itcollege.ee/~mmozniko/test/index.php?page=galerii');
    }
}



