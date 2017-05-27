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

    public function _setFile($t, $i){
        $this->name=$t;
        $this->information=$i;
        $this->write();
    }
    public function _getFile(){
        $this->read();
        return $this->data;
    }
    private function write(){
        try{
            $myfile = fopen("log/".$this->name, "w");
        } catch (Exception $e){
            die("Unable to open file!");
        }
        fwrite($myfile, $this->information."\n");
        fclose($myfile);
    }
    private function read(){
        try{
            $myfile = fopen("log/".$this->name, "r");
        } catch (Exception $e){
            die("Unable to open file!");
        }
        $num_lines = count(file($myfile));
        while(!feof($myfile)) {
            $row=fgets($myfile) . "<br>";
            $this->data=$row;
        }
        fclose($myfile);
    }
}