<?php

/**
 * Created by PhpStorm.
 * User: marko
 * Date: 07/05/2017
 * Time: 15:19
 */
class ContainerSize
{
    private $directory;
    private $max_width, $max_height, $width_style, $height_style, $filename;

    function __construct($width, $height, $dir, $filename)
    {
        $this->max_width=$width;
        $this->max_height=$height;
        $this->directory=$dir;
        $this->filename=$filename;
        $this->change();
    }
    function getWidth(){
        return $this->width_style;
    }
    function change(){
        list($width, $height) = getimagesize($this->directory."/".$this->filename);
//        print "Image width  is: " . $width;
//        print "Image height is: " . $height;
        $width_percent = $this->max_width/$width;
        $height_percent = $this->max_height/$height;
        $scale = ($width_percent>$height_percent)?'height':'width';
        $scale_percent = $scale.'_percent';
        $scale_percent = $$scale_percent;
        $width*=$scale_percent;
        $height*=$scale_percent;
        $this->width_style= 'style="width: '.$width.'px;"';
        $this->height_style= 'style="height: '.$height.'px;"';
    }

}