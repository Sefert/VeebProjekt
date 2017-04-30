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
    private $data;

    public function __construct($get){
        $this->firstname=$get['forname'];
        $this->lastname=$get['surname'];
        $this->password=$get['password'];
        $this->email=$get['mail'];
        if (!empty($get('forname'))){
            $this->register();
        }
    }
    public function _getData(){
        $this->read();
        return $this->data;
    }
    private function _connect(){
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
            $this->connection=$connection;
            try {
                mysqli_query($connection, "SET CHARACTER SET UTF8");
            } catch (Exception $e){
                die("Ei saanud baasi utf-8-sse - " . mysqli_error($connection));
            }
        } catch (Exception $e){
            die("Ei saa ühendust mootoriga");
        }
    }
    private function _disconnect() {
        mysqli_close($this->connection());
        $this->connection=null;
    }
    private function register()
    {
        $this->_connect();
        try {
            $sql = "INSERT INTO Markmosk_kasutaja (Eesnimi, Perenimi, Parool, Epost) VALUES ($this->firstname, $this->lastname, $this->password, $this->email)";
            $this->connection->exec($sql);
            echo "New record created successfully";
        } catch (Exception $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $this->_disconnect();
    }
    private function read(){
        $this->_connect();
        $sql = "SELECT * FROM Markmosk_kasutaja";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $this->data= "id: " . $row["id"]. " - Nimi: " . $row["Eesnimi"]. " " . $row["Perenimi"]." Parool: " . $row["Parool"] . "  Email: " . $row["Epost"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
}
