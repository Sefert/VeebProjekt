<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 15/04/2017
 * Time: 16:56
 */

require_once("view/top.html");
require_once("functions.php");

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($page))
    $page="galerii";
if (isset($_GET['page']) && $_GET['page']!=""){
    $page=htmlspecialchars($_GET['page']);
}

if (isset($_COOKIE['galerii'])){
    $session_id=$_COOKIE['galerii'];
    if ($_SERVER['REMOTE_ADDR'] != $_SESSION[$_COOKIE['galerii']][5]){
        $page = "galerii";
        destroy();
    }
}
if (isset($_POST['Logout'])) {
    $page = "galerii";
    destroy();
}
if (isset($_POST['Register']) || isset($_POST['Login'])){
    $page = $_POST['switch'];
}
if (isset($_COOKIE['galerii']) && !isset($_POST['Login'])){
    $session_id=$_COOKIE['galerii'];
    if (isset($_GET['page'])){
        $page="login".$_GET['page'];
    }
}
if (isset($_POST['UpPic'])){
        require_once ("functions.php");
        $prompt=uppic("filetoupload",$_COOKIE['galerii']);
        foreach ($prompt as $value)
            print $value;
}
switch($page){
    case "lisa":
        include("view/lisa.php");
        $page="lisa";
        break;
    case "loend":
        include("view/readdb.php");
        $page="loend";
        break;
    case "logingalerii":
        include('view/galerii.php');
        break;
    case "loginloend":
        include("view/readdb.php");
        break;
    case "loginkasutaja":
        include("view/lisapildid.php");
        break;
    default:
        include('view/galerii.php');
}
require_once("view/menu.php");
require_once("view/bottom.html");