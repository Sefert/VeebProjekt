<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 14/05/2017
 * Time: 15:39
 */
function uppic($name,$f){
    $folder = $_SESSION[$f][3];
    require_once ("Upload.php");
    $upload= new Upload($name, $folder);
    $prompt=$upload->_getFeed();
    return $prompt;
}