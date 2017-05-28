<?php

/**
 * Created by PhpStorm.
 * User: marko
 * Date: 30/04/2017
 * Time: 16:34
 */
class Database {
    protected $host="localhost";
    protected $user="test";
    protected $pass="t3st3r123";
    protected $db="test";
    private  $firstname;
    private $lastname;
    private $password;
    private $email;
    private $connection;
    private $kataloog, $bool;
    private $data=array();

    public function _setReg($f,$l,$p,$m){
        $this->firstname=$f;
        $this->lastname=$l;
        $this->password=$p;
        $this->email=$m;
        $this->register();
    }
    public function _checkData($m,$p){
        $this->email=$m;
        $this->password=$p;
    }
    public function _getFolder(){
        $this->location();
        return $this->kataloog;
    }
    public function _getData(){
        $this->read();
        return $this->data;
    }
    public function _setIdentify($m, $p){
        $this->email=$m;
        $this->password=$p;
        $this->identify();
    }
    public function _getIdentify(){
        return $this->data;
    }
    public function _getMailBool(){
        $this->isMail();
        return $this->bool;
    }
    public function _getcheckDataBool(){
        $this->checkData();
        return $this->bool;
    }
    private function _connect(){
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
            $this->connection=$connection;
            try {
                mysqli_query($this->connection, "SET CHARACTER SET UTF8");
            } catch (Exception $e){
                die("Ei saanud baasi utf-8-sse - " . mysqli_error($this->connection));
            }
        } catch (Exception $e){
            die("Ei saa ühendust mootoriga");
        }
    }
    private function _disconnect() {
        mysqli_close($this->connection);
        $this->connection=null;
    }
    private function register()
    {
        $this->_connect();
        try {
            $sql = "INSERT INTO Markmosk_kasutaja (Eesnimi, Perenimi, Parool, Epost, Kataloog) VALUES ('$this->firstname', '$this->lastname', SHA1('$this->password'),'$this->email',MD5('$this->email'))";
            if (mysqli_query($this->connection, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
            }

        } catch (Exception $e) {
            echo $sql . "<br>" . $e;
        }
        $this->createFolder();
        $this->_disconnect();
    }
    private function read(){
        $this->_connect();
        $sql = "SELECT * FROM Markmosk_kasutaja ORDER BY Perenimi ASC";
        $result = mysqli_query($this->connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $this->data[] = $row;
        }
        $this->_disconnect();
    }
    private function identify(){
        $this->_connect();
        $m=mysqli_real_escape_string($this->connection,$this->email);
        $p=mysqli_real_escape_string($this->connection,SHA1($this->password));
        $sql = "SELECT Eesnimi, Perenimi, Kataloog, roll FROM Markmosk_kasutaja WHERE Epost='$m' AND Parool='$p'";
        $result = mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $this->data=$row;
        $this->_disconnect();
    }
    private function createFolder(){
        $sql = "SELECT Kataloog FROM Markmosk_kasutaja WHERE Epost='$this->email'";
        $result= mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_row($result);
//        chmod('/home/mmozniko/public_html/img/galerii' ,0777);
        mkdir('img/galerii/'.$row[0] , 0777, true);
//        chmod('/home/mmozniko/public_html/img/galerii/'.$row[0] ,0777);
//       print_r($row);
    }
    private function location(){
        $this->_connect();
        $sql = "SELECT Kataloog FROM Markmosk_kasutaja WHERE Epost='$this->email'";
        $result= mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_row($result);
        $this->kataloog=$row[0];
        $this->_disconnect();
    }
    private function isMail(){
        $this->_connect();
        $sql = "SELECT Epost FROM Markmosk_kasutaja WHERE Epost='$this->email'";
        $result= mysqli_query($this->connection, $sql);
        if ($result && mysqli_num_rows($result) > 0){
            $this->bool=true;
        } else {
            $this->bool=false;
        }
        $this->_disconnect();
    }
    private function checkData(){
        $this->_connect();
        $m=mysqli_real_escape_string($this->connection,$this->email);
        $p=mysqli_real_escape_string($this->connection,SHA1($this->password));
        $sql = "SELECT Epost FROM Markmosk_kasutaja WHERE Epost='$m' AND Parool='$p'";
        $result= mysqli_query($this->connection, $sql);
        if ($result && mysqli_num_rows($result) > 0){
            $this->bool=true;
        } else {
            $this->bool=false;
        }
        $this->_disconnect();
    }
}
