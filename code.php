<?php include 'links.php';
 include 'functions.php';
error_reporting(0);

$submit= $_POST['import'];
if(isset ($submit))
{
	include 'conn.php';
	
       $jsonFile=$_POST['file'];
       $jsondata = file_get_contents($jsonFile);
       $data = json_decode($jsondata, true);

        $array_data = $data;

	if ($con->connect_error) 
	{
		die("Connection failed: " . $con->connect_error);
	}
	foreach ($array_data as $row) 
	{
			$check="Select * from employee where employee_name='".$row["employee_name"]."' AND employee_mail='".$row["employee_mail"]."'";
			$result=mysqli_query($con,$check);
			$check1="Select * from event where event_id='".$row["event_id"]."' AND event_name='".$row["event_name"]."' AND event_date='".$row["event_date"]."'";
			$result1=mysqli_query($con,$check1);
			$check2="Select * from booking where participation_id='".$row["participation_id"]."'";
			$result2=mysqli_query($con,$check2);
			if (mysqli_num_rows($result2)==0)
			{
				if (mysqli_num_rows($result)==0)
				{
					$sql = "INSERT INTO employee (employee_name, employee_mail) VALUES ('" . $row["employee_name"] . "', '" . $row["employee_mail"] . "')";
					mysqli_query($con,$sql) or die (mysqli_error($con));
					$id=mysqli_insert_id($con);
				}
				else 
				{
					while($row0 = mysqli_fetch_array($result))
					{
						$id=$row0['ID'];
					}					
				}
				
				
				if (mysqli_num_rows($result1)==0)
				{
					$sql1 = "INSERT INTO event (event_id, event_name,event_date) VALUES ('" . $row["event_id"] . "', '" . $row["event_name"] . "', '" . $row["event_date"] . "')";
					mysqli_query($con,$sql1) or die (mysqli_error($con));
					$eid=mysqli_insert_id($con);
				}
				else 
				{
					while($row1 = mysqli_fetch_array($result1))
					{
						$eid=$row1['ID'];
					}					
				}
				
				    $data = array(
						'participation_id'  =>  $row['participation_id'],			
						'employee_id'  =>  $id,
						'event_id'  =>  $eid,
						'participation_fee'  =>  $row['participation_fee']
					);
				
				$qry = Insert('booking',$data);

					$set['message'][]=array('msg'=>'Record has been added','success'=>'1');	

			}
			else 
			{
						$set['message'][]=array('msg'=>'Record has already added','success'=>'0');	
			}
				
				
			
			
	}
	
	
		echo '<script>alert("Record has  been imported")</script>';			
	 
		$con->close();
}
    ?>