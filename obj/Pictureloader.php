<?php

/**
 * Created by PhpStorm.
 * User: marko
 * Date: 07/05/2017
 * Time: 16:11
 */
class Pictureloader
{
    private $files;
    private $directory;
    function __construct($dir)
    {
        $this->directory=$dir;
        $this->load_pictures();
    }
    public function getPictures(){
        return $this->files;
    }
    private function load_pictures(){
        if ($handle = opendir($this->directory)) {
                $this->files=preg_grep('/^([^.])/',scandir($this->directory));
        }
    }


}