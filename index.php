<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 15/04/2017
 * Time: 16:56
 */
require_once("top.html");
if (!isset($page))
    $page="galerii";
if (isset($_GET['page']) && $_GET['page']!=""){
    $page=htmlspecialchars($_GET['page']);
}
if (isset($_POST['Login']) || isset($_POST['Register'])){
    $page = $_POST['switch'];
    //var_dump($_POST);
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
    default:
        include('galerii.php');
}
require_once("menu.php");
require_once("bottom.html");