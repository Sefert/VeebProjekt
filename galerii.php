<?php

if (isset($_COOKIE["galerii"])){
    $directory="img/galerii/".$_SESSION[$_COOKIE["galerii"]][3];
} elseif (isset($_GET['fold'])){
    $directory="img/galerii/".$_GET['fold'];
    setcookie("galeriiview",$_GET['fold'], time() + 60);
} elseif (isset($_COOKIE["galeriiview"])){
    $directory="img/galerii/".$_COOKIE["galeriiview"];
} else
    $directory = "img/galerii/9074b5ab3efe87a10d8cb9b62de76338";

ini_set('allow_url_fopen',1);

require_once ("ContainerSize.php");
require_once ("Pictureloader.php");
$files=new Pictureloader($directory);
$files=$files->getPictures();
//print_r($files);
//echo dirname(__DIR__);
$filecount=count($files);


if (!empty($_GET['addim'])){
    $i=$_GET['addim'];
} elseif ($filecount == 1){
    $i = 1;
} else {
    $i = 2;
}
if ($filecount != 0){
    if (1<$i && $i<=$filecount) {
        $width_side_style = new ContainerSize(800, 200, $directory, $files[$i]);
        $width_left_side_style = $width_side_style->getWidth();
    }
    $width_style= new ContainerSize(800,500,$directory,$files[$i+1]);
    $width_style=$width_style->getWidth();
    if ($i<$filecount) {
        $width_side_style = new ContainerSize(800, 200, $directory, $files[$i + 2]);
        $width_right_side_style = $width_side_style->getWidth();
    }
}

?>
<?php if ($filecount != 0) :?>
    <div>
        <?php if ($i<$filecount):?>
        <div id="right" class="mid" <?php echo $width_right_side_style?>>
            <img try src="<?php echo $directory."/".$files[$i+2]?>" onclick="add(<?php echo $i ?>)">
        </div>
        <?php endif;?>
        <div class="center mid" <?php echo $width_style?> >
            <img src="<?php echo $directory."/".$files[$i+1]?>">
            <div style="max-height:150px; overflow: hidden;"><img class="mirror" src="<?php echo $directory."/".$files[$i+1]?>"></div>
        </div>
        <?php if (1<$i && $i<=$filecount):?>
        <div id="left" class="mid" <?php echo $width_left_side_style?> >
            <img src="<?php echo $directory."/".$files[$i]?>" onclick="subtract(<?php echo $i ?>)">
        </div>
        <?php endif;?>
    </div>
<?php endif; ?>