<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 14/05/2017
 * Time: 15:39
 */
function uppic($name,$f){
    $folder = $_SESSION[$f][3];
    require_once("obj/Upload.php");
    $upload= new Upload($name, $folder);
    $prompt=$upload->_getFeed();
    return $prompt;
}
function testField(){
    if (empty($_POST["surname"]) || empty($_POST["forname"]) || empty($_POST["password"]) || empty($_POST["password2"]) || empty($_POST["mail"])) {
        $prompt = "Kõikide väljade täitmine on kohustuslik!!";
    } else {
        if (preg_match("%@%",$_POST["mail"])) {
            require_once("obj/Database.php");
            $data = new Database();
            $data->_checkData(htmlspecialchars($_POST["mail"]),htmlspecialchars($_POST["password"]));
            $data=$data->_getMailBool();
//                print_r($data);
            if ($data){
                $prompt = "Antud e-post on juba kasutusel!!";
            } else {
                if (strlen($_POST["password"]) <= 5) {
                    $prompt = "Sisestatud paroolid on liiga lühikesed!!";
                } else {
                    if ($_POST["password"] != $_POST["password2"]) {
                        $prompt = "Sisestatud paroolid ei kattu!!";
                    } else {
                        $prompt = "Registreeritud!";
                        include('session.php');
                    }
                }
            }
        } else {
            $prompt = "E-posti aadress on vigane!!";
        }
    }
    return $prompt;
}
function testLogin(){
    require_once("obj/Database.php");
    $data = new Database();
    $data->_checkData(htmlspecialchars($_POST["mail"]),htmlspecialchars($_POST["password"]));
    $data=$data->_getcheckDataBool();
    if (!$data)
        $prompt = "Kasutaja või parool vale!!";
    else {
        $prompt = "";
        include('session.php');
    }
    return $prompt;
}
function directory(){
    if (isset($_COOKIE["galerii"])){
        $directory="img/galerii/".$_SESSION[$_COOKIE["galerii"]][3];
    } elseif (isset($_GET['fold'])){
        $directory="img/galerii/".$_GET['fold'];
        setcookie("galeriiview",$_GET['fold'], time() + 60);
    } elseif (isset($_COOKIE["galeriiview"])){
        $directory="img/galerii/".$_COOKIE["galeriiview"];
    } else
        $directory = "img/galerii/default";
    return $directory;
}
function geti($filecount){
    if (!empty($_GET['addim'])){
        $i=$_GET['addim'];
        if ($i<0)
            $i=1;
        elseif ($i>$filecount)
            $i=$filecount;
    } elseif ($filecount == 1){
        $i = 1;
    } else {
        $i = 2;
    }
    return $i;
}
function style($filecount, $i, $directory, $files){
    require_once("obj/ContainerSize.php");
    $style=array();
    if ($filecount != 0){
        if (1<$i && $i<=$filecount) {
            $width_side_style = new ContainerSize(800, 200, $directory, $files[$i]);
            $style[0] = $width_side_style->getWidth();
        }
        $width_style= new ContainerSize(800,500,$directory,$files[$i+1]);
        $style[1]=$width_style->getWidth();
        if ($i<$filecount) {
            $width_side_style = new ContainerSize(800, 200, $directory, $files[$i + 2]);
            $style[2] = $width_side_style->getWidth();
        }
    }
    return $style;
}
function destroy(){
    unset($_SESSION[$_COOKIE['galerii']]);
    echo "<script> document.location.assign('http://enos.itcollege.ee/~mmozniko/index.php?page=galerii'); </script>";
}
