<?php
include "config/config.php";
class Database
{
    public $servername = servername;
    public $username = username;
    public $databaseName = databaseName;
    public $password = password;
    public $conn;


    public function __construct()
    {
        $this->connect();
    }


    public function connect()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->databaseName);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function insert($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }
    public function selectAll($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }
    public function select($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }
    public function update($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }
    public function delete($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }
}
