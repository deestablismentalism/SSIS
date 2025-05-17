<?php
declare(strict_types=1);

include_once __DIR__ . '/../server_side/dbconnection.php';

class subjectsModel {

    protected $conn;

    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }

    public function insertSubject($subject) {
        $sql = "INSERT INTO subjects(Subject_Name) VALUES (:subjects)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':subjects', $subject);
        if($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        else {
            return "error ";
        }

    }
    public function insertGradeLevelSubjects($subjectId, $gradeLevelId) {
        $sql = "INSERT INTO grade_level_subjects(Grade_Level_Id, Subject_Id) VALUES (:subjectId, :gradeLevelId)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':subjectId', $subjectId);
        $stmt->bindParam(':gradeLevelId', $gradeLevelId, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function insertSubjectAndLevel($subjectName, $gradeLevelId) {
        try {
            $this->conn->beginTransaction();

            $subjectId = $this->insertSubject($subjectName);

            $this->insertGradeLevelSubjects($subjectId, $gradeLevelId);

            $this->conn->commit();

            return "succesfully inserted";
        }
        catch(PDOException $e) {
            $this->conn->rollBack();
            return "Error" . $e->getMessage();
        }
    }

    public function getSubjectsPerGradeLevel() {
        try {
            $sql = "SELECT
                    s.Subject_Name,
                    g.Grade_Level
                    FROM grade_level_subjects
                    JOIN subjects s ON grade_level_subjects.Subject_Id = s.Subject_Id
                    JOIN grade_level g ON grade_level_subjects.Grade_Level_Id = g.Grade_Level_Id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        catch(PDOException $e) {
            return "Error" . $e->getMessage();
        }
    }

}