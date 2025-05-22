<?php
    declare(strict_types=1);

require_once __DIR__ . '/dbconnection.php';
require_once __DIR__ . '/EnrolleesModel.php';

class AdminEnrollmentStatusView {
    protected $conn;
    protected $getEnrollees;
    public const ENROLLED = 1;
    public const DENIED = 2;
    public const PENDING = 3;

    public function stringEquivalent(int $value): string {
       switch($value) {
            case self::ENROLLED:
                return "ENROLLED";
            case self::DENIED:
                return "DENIED";
            case self::PENDING:
                return "PENDING";
        }
    }
    public function __construct(){
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->getEnrollees = new getEnrollees();
    }

    public function displayCount() {
        try {
            $count = $this->getEnrollees->countEnrollees();
            echo "<h2>" . htmlspecialchars($count) . "</h2>";
        }
        catch(PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    }
    public function displayEnrollees() {
    
        try {
    
            $data = $this->getEnrollees->getPendingEnrollees();
            foreach($data as $rows) {   
                $studentMiddleInitial = !empty($rows['Student_Middle_Name']) ? substr($rows['Student_Middle_Name'], 0, 1) . "." : "";
                echo '<tr class="enrollee-row"> 
                        <td>' . $rows['Learner_Reference_Number'] . '</td>
    
                        <td>' .htmlspecialchars($rows['Student_Last_Name']) . ', ' 
                        .htmlspecialchars($rows['Student_First_Name']) . ' ' 
                        .htmlspecialchars($studentMiddleInitial) . '</td>
                        <td>' . $rows['Age'] . '</td>
                        <td>' . htmlspecialchars($rows['Birth_Date']) . '</td> 
                        <td>' . htmlspecialchars($rows['Sex']) . '</td>
                        <td> <button class="view-button" data-id="' . $rows['Enrollee_Id'] . '"> View info</button></td>
                        </tr>';
            }
        }
        catch(PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    }
    
}
