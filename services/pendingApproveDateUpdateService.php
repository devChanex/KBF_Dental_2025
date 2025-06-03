<?php
//Service for Registration

require_once('databaseService.php');
$clientid = urldecode($_POST['clientid']);
$approveDate = urldecode($_POST['date']);


//echo'<script>alert("tesT");</script>';
//INHERITANCE -- CREATING NEW INSTANCE OF A CLASS (INSTANTIATE)
$service = new ServiceClass();
$result = $service->bookappointmentinfo($clientid, $approveDate);
echo $result;
//USE THIS AS YOUR BASIS
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
	public function bookappointmentinfo($clientid, $approveDate)
	{
		//:a,:b parameter
		try {

			$query = "update bookappointmentinfo set dateassigned=:a, status='Booked' where clientid=:b";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':a', $approveDate);
			$stmt->bindParam(':b', $clientid);

			$stmt->execute();


			$query = "select * from bookappointmentinfo where clientid=:b";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':b', $clientid);
			$stmt->execute();
			$eventname = '';
			if ($stmt->rowCount() > 0) {
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$eventname = $row["lName"] . ', ' . $row["fName"];
				}
			}


			$query = "insert into calendar_event_master (event_name,event_start_date,event_end_date) values (:a,:b,:c)";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':a', $eventname);
			$stmt->bindParam(':b', $approveDate);
			$stmt->bindParam(':c', $approveDate);

			$stmt->execute();
			return "success";
		} catch (Exception $e) {
			return "Error:" . $e->getMessage();
		}



	}
	//UNTIL THIS CODE

}
//UNTIL HERE COPY



?>