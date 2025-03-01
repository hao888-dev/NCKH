<?php
require_once "lib/database.php"; // Đảm bảo chỉ load 1 lần

class usersClass
{
    public $Database;



    public function __construct()
    {
        $this->Database = new Database();
    }



    public function insert_users($data)
    {
        $usersName = $data['usersName'];
        $usersEm = $data['usersEm'];
        $usersPw = $data['usersPw'];
        $sql = "INSERT INTO users (usersName,usersEm,usersPw)
        
        VALUES ('$usersName','$usersEm','$usersPw')";
        $result = $this->Database->insert($sql);
        return $result;
    }
    public function select_users_All()
    {
        $sql = "SELECT * FROM users";
        $result = $this->Database->selectAll($sql);
        return $result;
    }
    public function select_users($usersId)
    {
        $sql = "SELECT * FROM users WHERE usersId = '$usersId'";
        $result = $this->Database->select($sql)->fetch_assoc();
        return $result;
    }
    public function update_users($data, $usersId)
    {
        $usersName = $data['usersName'];
        $usersEm = $data['usersEm'];
        $usersPw = $data['usersPw'];

        $sql = "UPDATE users SET 
        usersName = '$usersName'
        ,usersEm = '$usersEm'
        ,usersPw = '$usersPw', 
        WHERE usersId = '$usersId'";
        $result = $this->Database->update($sql);

        header('Location:' . 'usersList.php');
    }
    public function delete_users($usersId)
    {
        $sql = "DELETE FROM users WHERE usersId = '$usersId'";
        $result = $this->Database->delete($sql);
        return $result;
    }
}
