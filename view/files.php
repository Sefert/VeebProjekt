<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 15/04/2017
 * Time: 16:56
 */
require_once ("functions.php");

$list=delpic($_COOKIE['galerii']);
echo '<div id="move" class="center mid autoheight lisa ">';
echo '<form action="index.php" method="post">';
foreach ($list as $e){
    echo '<input id="'.$e.'" type="checkbox" name="'.$e.'" value="'.$e.'"><label class="txt" style="vertical-align: middle;" for="'.$e.'">'.$e.'</label><br>';
}
echo '<button class="button noborder" type="submit" name="delete">KUSTUTA</button>';
echo '</form>';
echo '</div>';


