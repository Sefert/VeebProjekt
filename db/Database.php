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
    private $kataloog;
    private $data=array();

    public function _setReg($f,$l,$p,$m){
        $this->firstname=$f;
        $this->lastname=$l;
        $this->password=$p;
        $this->email=$m;
        if (isset($f))
            $this->register();
    }
    public function _getData(){
        $this->read();
        return $this->data;
    }
    public function _setIdentify($m, $p){
        $this->email=$m;
        $this->password=$p;
    }
    public function _getIdentify(){
        $this->identify();
        return $this->data;
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
        //$this->data=mysqli_fetch_assoc($result);
        while ($row = mysqli_fetch_assoc($result)) {
            $this->data[] = $row;
        }
        //$result = $this->connection->query($sql);

//        if ($result->num_rows > 0) {
//            while($row = $result->fetch_assoc()) {
//                $this->data= "id: " . $row["id"]. " - Nimi: " . $row["Eesnimi"]. " " . $row["Perenimi"]." Parool: " . $row["Parool"] . "  Email: " . $row["Epost"] . "<br>";
//            }
//        } else {
//            echo "0 results";
//        }
        $this->_disconnect();
    }
    private function identify(){
        $this->_connect();
        $sql = "SELECT Eesnimi, Perenimi FROM Markmosk_kasutaja WHERE Epost='$this->email' AND Parool='$this->password'";
        $result = mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $this->data=$row;
        $this->_disconnect();
    }
    private function createFolder(){
        $sql = "SELECT Kataloog FROM Markmosk_kasutaja WHERE Email='$this->email'";
        $result = mysqli_query($this->connection, $sql);
        mkdir('img/galerii/'.$result,0666, true);
    }
}
