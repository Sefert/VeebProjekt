<?php

require_once('obj/Database.php');
require_once ('obj/ReadWrite.php');

if(!isset($_SESSION)){
    session_start();
}

if (!isset($_COOKIE["galerii"])) {
    setcookie("galerii",$_POST['mail'], time() + 10*60);
    if (isset($_POST['Register'])){
        $fname = htmlspecialchars($_POST['forname']);
        $lname = htmlspecialchars($_POST['surname']);
        $password = htmlspecialchars($_POST['password']);
        $mail = htmlspecialchars($_POST['mail']);
        $register=new Database();
        $register->_setReg($fname,$lname,$password,$mail);
        $folder = new Database();
        $folder->_setIdentify($mail,$password);
        $folder = $folder->_getIdentify();
        $_SESSION[$mail]=array($fname, $lname, $mail, $folder['Kataloog'], $folder['roll'],$_SERVER['REMOTE_ADDR'],time(),time()+60);
        if (!empty($_SESSION[$mail])){
            $info=$mail.'|'.$_SERVER['REMOTE_ADDR'].'|'.date(DATE_RFC2822);
            $write=new ReadWrite();
            $write->_setFile('log.txt',$info);
            echo "<script> document.location.assign('http://enos.itcollege.ee/~mmozniko/index.php?page=galerii'); </script>";
        }
    } elseif (isset($_POST['Login'])){
        $password = htmlspecialchars($_POST['password']);
        $mail = htmlspecialchars($_POST['mail']);
        $login = new Database();
        $login->_setIdentify($mail, $password);
        $login = $login->_getIdentify();
        $_SESSION[$mail]=array($login['Eesnimi'], $login['Perenimi'], $mail, $login['Kataloog'], $login['roll'],$_SERVER['REMOTE_ADDR'], time(),time()+60);
        if (!empty($_SESSION[$mail])) {
            $info=$mail.'|'.$_SERVER['REMOTE_ADDR'].'|'.date(DATE_RFC2822);
            $write = new ReadWrite();
            $write->_setFile('log.txt', $info);
            echo "<script> document.location.assign('http://enos.itcollege.ee/~mmozniko/index.php?page=galerii'); </script>";
        }
    }
}



