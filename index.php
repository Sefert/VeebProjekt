<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 15/04/2017
 * Time: 16:56
 */
require_once("top.html");
$page="galerii";
if (isset($_GET['page']) && $_GET['page']!=""){
    $page=htmlspecialchars($_GET['page']);
}

switch($page){
    case "lisa":
        include("lisa.php");
        break;
    default:
        include('galerii.php');
}
require_once("menu.html");
require_once("bottom.html");