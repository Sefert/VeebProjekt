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
if (isset($_COOKIE['galerii']) && !isset($_SESSION[$_COOKIE['galerii']][5])){
//    echo $_COOKIE['galerii'].$_SESSION[$_COOKIE['galerii']][5];
    echo "SIIIIIIIN";
    unset($_COOKIE['galerii']);
}

if (!isset($page))
    $page="galerii";
if (isset($_GET['page']) && $_GET['page']!=""){
    $page=htmlspecialchars($_GET['page']);
}

if (isset($_POST['Logout'])) {
    destroy();
    unset($_COOKIE['galerii']);
    setcookie("galerii",$_POST['mail'], time()-3600);
    $page = "galerii";
}

if (isset($_COOKIE['galerii'])){
    if (!isset($_POST['Logout']) && isset ($_SESSION[$_COOKIE['galerii']][5])) {
        if ($_SERVER['REMOTE_ADDR'] != $_SESSION[$_COOKIE['galerii']][5]) {
            $page = "galerii";
            destroy();
        }
    }
}

if (isset($_POST['Register']) || isset($_POST['Login'])){
    $page = $_POST['switch'];
}
if (isset($_COOKIE['galerii']) && !isset($_POST['Login'])) {
    $session_id = $_COOKIE['galerii'];
    if (isset($_GET['page'])) {
        $page = "login" . $_GET['page'];
    }
}
if (isset($_POST['UpPic'])){
    require_once ("functions.php");
    $prompt=uppic("filetoupload",$_COOKIE['galerii']);
    foreach ($prompt as $value)
        print '<p class="txt">'. $value . '</p>';;
}
if (isset($_POST['DelPic'])){
    $page="loginfiles";
}
if (isset($_POST['delete'])){
    $page="galerii";
//    print_r($_POST);
    delete();
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
    case "loginlogi":
        include("view/logi.php");
        break;
    case "loginfiles":
        include("view/files.php");
        break;
    default:
        include('view/galerii.php');
}
require_once("view/menu.php");
require_once("view/bottom.html");