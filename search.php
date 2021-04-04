<?php 
include 'conn.php';
	error_reporting(0);
	$search=$_POST['search'];
	$employ_name=$_POST['ename'];
	$event_nam=$_POST['event_nam'];
	$date1=$_POST['date1'];
	if(isset($search))
	{
	 	$sql10="SELECT booking.participation_id,booking.participation_fee,employee.employee_name,employee.employee_mail,event.event_name,event.event_id,event.event_date FROM event INNER JOIN booking ON  event.ID=booking.event_id INNER JOIN  employee ON booking.employee_id=employee.ID  Where booking.employee_id Like '%".$employ_name."%' AND booking.event_id LIKE '%".$event_nam."%' AND event.event_date Like'%".$date1."%' ";
	 	$sql11="SELECT SUM(booking.participation_fee)AS Total FROM event INNER JOIN booking ON  event.ID=booking.event_id INNER JOIN  employee ON booking.employee_id=employee.ID  Where booking.employee_id Like '%".$employ_name."%' AND booking.event_id LIKE '%".$event_nam."%' AND event.event_date Like'%".$date1."%' ";

	}
	else
	{
		$sql10="SELECT booking.participation_id,booking.participation_fee,employee.employee_name,employee.employee_mail,event.event_name,event.event_id,event.event_date FROM event INNER JOIN booking ON  event.ID=booking.event_id INNER JOIN  employee ON booking.employee_id=employee.ID   ";
		
	 	$sql11="SELECT SUM(booking.participation_fee)AS Total FROM event INNER JOIN booking ON  event.ID=booking.event_id INNER JOIN  employee ON booking.employee_id=employee.ID ";
	}
	
		
	$result10 = mysqli_query($con,$sql10)or die(mysqli_error($con));     
	$result11 = mysqli_query($con,$sql11)or die(mysqli_error($con)); 
		    
					
					?>