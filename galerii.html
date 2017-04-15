<?php
$directory = "img/galerii";
$filecount = 0;
if ($handle = opendir($directory)) {
        while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..')) && !is_dir($directory.$file))
                $filecount++;
        }
    }
ini_set('allow_url_fopen',1);
list($width, $height) = getimagesize($directory."/bergen1.jpg");
print "Image width  is: " . $width;
print "Image height is: " . $height;
$max_width = 800;
$max_height = 500;
$width_percent = $max_width/$width;
$height_percent = $max_height/$height;
$scale = ($width_percent>$height_percent)?'height':'width';
$scale_percent = $scale.'_percent';
$scale_percent = $$scale_percent;
$width*=$scale_percent;
$height*=$scale_percent;
$width_style= 'style="width: '.$width.'px;"';
if(function_exists('exif_read_data')) {
    $exif = exif_read_data($directory."/bergen1.jpg", 0, true);
    foreach ($exif as $key => $section) {
        foreach ($section as $name => $val) {
            echo "$key.$name: $val<br />\n";
        }
    }
}
?>
<p><?php echo "Kataloogis on ".$filecount." pilti"?></p>
<div class="center mid" <?php echo $width_style?> >
    <img src="img/galerii/bergen1.jpg">
    <div>

    </div>
</div>
