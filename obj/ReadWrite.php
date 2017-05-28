<?php

/**
 * Created by PhpStorm.
 * User: marko
 * Date: 26/05/2017
 * Time: 22:40
 */
class ReadWrite
{
    private $name, $information, $data=array();

    public function _setFile($n, $i){
        $this->name=$n;
        $this->information=$i;
        $this->write();
    }
    public function _setReadFile($n){
        $this->name=$n;
    }
    public function _getFile(){
        $this->read();
        return $this->data;
    }
    private function write(){
        try{
            $myfile = fopen("log/".$this->name, "a");
        } catch (Exception $e){
            die("Unable to open file!");
        }
        fwrite($myfile, $this->information . PHP_EOL);
        fclose($myfile);
    }
    private function read(){
        try{
            $myfile = fopen("log/".$this->name, "r");
        } catch (Exception $e){
            die("Unable to open file!");
        }
        $this->data = explode(PHP_EOL,fread($myfile, filesize("log/".$this->name)));
//        $num_lines = count(file($myfile));
//        while(!feof($myfile)) {
//            $row=fgets($myfile) . "<br>";
//            $this->data=$row;
//        }
        fclose($myfile);
    }
}