<?php
require_once "lib/database.php"; // Đảm bảo chỉ load 1 lần


class DirectoryClass
{
    public $Database;



    public function __construct()
    {
        $this->Database = new Database();
    }



    public function insert_dictory($data)
    {
        $dictoryName = $data['dictoryName'];
        $sql = "INSERT INTO dictory (dictoryName)
        VALUES ('$dictoryName')";
        $result = $this->Database->insert($sql);
        return $result;
    }

    public function select_dictory_All()
    {
        $sql = "SELECT * FROM dictory";
        $result = $this->Database->selectAll($sql);
        return $result;
    }
    public function select_dictory($dictoryId)
    {
        $sql = "SELECT * FROM dictory WHERE dictoryId = '$dictoryId'";
        $result = $this->Database->select($sql)->fetch_assoc();
        return $result;
    }

    public function update_dictory($data, $dictoryId)
    {
        $dictoryName = $data['dictoryName'];
        $sql = "UPDATE dictory SET 
        dictoryName = '$dictoryName' 
        WHERE dictoryId = '$dictoryId'";
        $result = $this->Database->update($sql);

        header('Location:' . 'dictoryList.php');
    }
    public function delete_dictory($dictoryId)
    {
        $sql = "DELETE FROM dictory WHERE dictoryId = '$dictoryId'";
        $result = $this->Database->delete($sql);
        return $result;
    }
}
