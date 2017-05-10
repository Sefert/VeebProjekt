<?php
session_start();
require_once ('db/Database.php');
if (!isset($_COOKIE["galerii"])) {
    setcookie("galerii", count($_SESSION), time() + 10);
} else {
    $position = $_COOKIE["galerii"];
    $firstname=$_SESSION['firstname'][$position];
    $lastname=$_SESSION['lastname'][$position];
    $email=$_SESSION['email'][$position];
    $addinfo=$_SESSION['addinfo'][$position];
    echo $position."/".$firstname."/".$lastname."/".$email."/".$addinfo;

}
if (!isset($_SESSION)){
    $_SESSION[0]=array();
}
if (isset($_GET)){
    $_SESSION['firstname'][count($_SESSION)] = $_POST['forname'];
    $_SESSION['lastname'][count($_SESSION)] = $_POST['surname'];
    $_SESSION['email'][count($_SESSION)] = $_POST['mail'];
    //$_SESSION['addinfo'][count($_SESSION)] = $_GET['addinfo'];
    $_SESSION['time'][count($_SESSION)] = time();
    $fname=htmlspecialchars($_POST['forname']);
    //echo $fname;
    $lname=htmlspecialchars($_POST['surname']);
    //echo $lname;
    $password=htmlspecialchars($_POST['password']);
    $mail=htmlspecialchars($_POST['mail']);
    $register=new Database();
    $register->_setReg($fname,$lname,$password,$mail);
    //var_dump($register);
}


