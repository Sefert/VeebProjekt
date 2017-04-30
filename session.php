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
    $_SESSION['firstname'][count($_SESSION)] = $_GET['forname'];
    $_SESSION['lastname'][count($_SESSION)] = $_GET['surname'];
    $_SESSION['email'][count($_SESSION)] = $_GET['mail'];
    //$_SESSION['addinfo'][count($_SESSION)] = $_GET['addinfo'];
    $_SESSION['time'][count($_SESSION)] = time();
    $fname=$_GET['forname'];
    //echo $fname;
    $lname=$_GET['surname'];
    //echo $lname;
    $password=$_GET['password'];
    $mail=$_GET['mail'];
    $register=new Database();
    $register->_setReg($fname,$lname,$password,$mail);
    //var_dump($register);
}


