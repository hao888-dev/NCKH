<?php
include "lib/database.php";


class DocClass
{
    public $Database;



    public function __construct()
    {
        $this->Database = new Database();
    }



    public function insert_doc($data)
    {
        $docName = $data['docName'];
        $docDate = $data['docDate'];
        $docDes = $data['docDes'];
        $docCon = $data['docCon'];
        $sql = "INSERT INTO doc (docName,docDate,docDes,docCon)
        
        VALUES ('$docName','$docDate','$docDes','$docCon')";
        $result = $this->Database->insert($sql);
        return $result;
    }
    public function select_doc_All()
    {
        $sql = "SELECT * FROM doc";
        $result = $this->Database->selectAll($sql);
        return $result;
    }
    public function select_doc($docId)
    {
        $sql = "SELECT * FROM doc WHERE docId = '$docId'";
        $result = $this->Database->select($sql)->fetch_assoc();
        return $result;
    }
    public function update_doc($data, $docId)
    {
        $docName = $data['docName'];
        $docDate = $data['docDate'];
        $docDes = $data['docDes'];
        $docCon = $data['docCon'];

        $sql = "UPDATE doc SET 
        docName = '$docName'
        ,docDate = '$docDate'
        ,docDes = '$docDes'
        ,docCon = '$docCon' 
        WHERE docId = '$docId'";
        $result = $this->Database->update($sql);

        header('Location:' . 'docList.php');
    }
    public function delete_doc($docId)
    {
        $sql = "DELETE FROM doc WHERE docId = '$docId'";
        $result = $this->Database->delete($sql);
        return $result;
    }
}
