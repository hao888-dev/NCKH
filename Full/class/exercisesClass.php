<?php
require_once "lib/database.php";

class exercisesClass
{
    public $Database;

    public function __construct()
    {
        $this->Database = new Database();
    }

    public function insert_exercises($data, $pdfName = null, $pdfId = null)
    {
        $exercisesName = $data['exercisesName'] ?? '';
        $dictoryId = $data['dictoryId'] ?? '';
        $exercisesDes = $data['exercisesDes'] ?? '';

        $sql = "INSERT INTO exercises (exercisesName, dictoryId, exercisesDes, pdfName, pdfId) 
                VALUES ('$exercisesName', '$dictoryId', '$exercisesDes', '$pdfName', '$pdfId')";

        $result = $this->Database->insert($sql);
        return $result;
    }

    public function select_exercises_All()
    {
        $sql = "SELECT * FROM exercises";
        $result = $this->Database->selectAll($sql);
        return $result;
    }

    public function select_exercises($exercisesId)
    {
        $sql = "SELECT * FROM exercises WHERE exercisesId = '$exercisesId'";
        $result = $this->Database->select($sql)->fetch_assoc();
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

    public function update_exercises($data, $exercisesId)
    {
        $exercisesName = $data['exercisesName'] ?? '';
        $dictoryId = $data['dictoryId'] ?? '';
        $exercisesDes = $data['exercisesDes'] ?? '';
        $pdfName = $data['pdfName'] ?? '';
        $pdfId = $data['pdfId'] ?? '';

        $sql = "UPDATE exercises SET 
                exercisesName = '$exercisesName',
                dictoryId = '$dictoryId',
                exercisesDes = '$exercisesDes',
                pdfName = '$pdfName',
                pdfId = '$pdfId'
                WHERE exercisesId = '$exercisesId'";

        $result = $this->Database->update($sql);
        header('Location: exercisesList.php');
    }

    public function delete_exercises($exercisesId)
    {
        $sql = "DELETE FROM exercises WHERE exercisesId = '$exercisesId'";
        $result = $this->Database->delete($sql);
        return $result;
    }

    public function select_exercises_by_dictory($dictoryId)
    {
        $sql = "SELECT * FROM exercises WHERE dictoryId = '$dictoryId'";
        $result = $this->Database->select($sql);
        return $result;
    }

    public function select_exercise_detail($exerciseId)
    {
        $sql = "SELECT * FROM exercises WHERE exercisesId = '$exerciseId'";
        $result = $this->Database->select($sql)->fetch_assoc();
        return $result;
    }
}
