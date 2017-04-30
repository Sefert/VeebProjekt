<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 30/04/2017
 * Time: 18:10
 */
    require_once('db/Database.php');
    $inquiry=new Database();
    //$inquiry->_getData();
    echo "<h2 style='color: white'>".$inquiry->_getData()."</h2>";

