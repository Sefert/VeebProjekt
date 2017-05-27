<?php

ini_set('allow_url_fopen',1);

require_once("functions.php");
require_once("obj/Pictureloader.php");

$directory=directory();
$files=new Pictureloader($directory);
$files=$files->getPictures();
$filecount=count($files);
$i=geti($filecount);
$style=style($filecount, $i, $directory, $files);


?>
<?php if ($filecount != 0) :?>
    <div>
        <?php if ($i<$filecount):?>
        <div id="right" class="mid" <?php echo $style[2]?>>
            <img src="<?php echo $directory."/".$files[$i+2]?>" onclick="add(<?php echo $i ?>)" alt="pilt">
        </div>
        <?php endif;?>
        <div class="center mid" <?php echo $style[1]?> >
            <img src="<?php echo $directory."/".$files[$i+1]?>" alt="pilt">
            <div style="max-height:150px; overflow: hidden;"><img class="mirror" src="<?php echo $directory."/".$files[$i+1]?>" alt="pilt"></div>
        </div>
        <?php if (1<$i && $i<=$filecount):?>
        <div id="left" class="mid" <?php echo $style[0]?> >
            <img src="<?php echo $directory."/".$files[$i]?>" onclick="subtract(<?php echo $i ?>)" alt="pilt">
        </div>
        <?php endif;?>
    </div>
<?php endif; ?>