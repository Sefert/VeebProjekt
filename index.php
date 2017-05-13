<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 15/04/2017
 * Time: 16:56
 */
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once("top.html");
if (!isset($page))
    $page="galerii";
if (isset($_GET['page']) && $_GET['page']!=""){
    $page=htmlspecialchars($_GET['page']);
}
if (isset($_POST['Register']) || isset($_POST['Login'])){
    $page = $_POST['switch'];
    //var_dump($_POST);
}
if (isset($_COOKIE['galerii'])){
    $session_id=$_COOKIE['galerii'];
    print_r($session_id);
    print_r($_SESSION[$session_id]);
    $page="galeriilogin";
}
switch($page){
    case "lisa":
        include("lisa.php");
        $page="lisa";
        break;
    case "loend":
        include("readdb.php");
        $page="loend";
        break;
    case "galeriilogin":
        include('galerii.php');
        break;
    default:
        include('galerii.php');
}
require_once("menu.php");
require_once("bottom.html");