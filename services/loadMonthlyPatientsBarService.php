<?php
require_once('databaseService.php');
$service = new ServiceClass();

$service->runMethod();

class ServiceClass
{

    private $conn;
    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }
    //DO NOT INCLUDE THIS CODE
    public function runMethod()
    {


        $arrayLabel = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
        $current_year=date('Y');
        //$query = "select distinct(year(date)) as 'yd' from treatmentsoa order by year(date) asc";
        //$stmt = $this->conn->prepare($query);
        //$stmt->execute();
        //if ($stmt->rowCount() > 0) {
         //   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          //      array_push($arrayLabel,$row["yd"]);
           // }
       // }
    

        $arrayData = array();
        for($x=1;$x<=12;$x++){
            $query = "SELECT count(clientid) as 'clients' FROM treatmentsoa where year(date)=:a and month(date)=:b";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':a', $current_year);
            $stmt->bindParam(':b', $x);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($arrayData,$row["clients"]);
                }
            }else{
                array_push($arrayData,0);
                }
            
        }
        $data['datas'] =$arrayData;
        $data['label'] = $arrayLabel;
        echo json_encode($data);
    }

}
?>