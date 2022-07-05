<?php
 		   $servername = "localhost";
	$username = "root";
	$password = "";
	$database="ovs";
	$con=mysqli_connect($servername,$username,$password,$database);
	$sql="select * from timer";
	$result=mysqli_query($con,$sql);
	while($res=mysqli_fetch_array($result))
	{
		$date=$res['date'];
		$time=$res['time'];
	}
	$data = new stdClass();
	$data->dt=$date;
	$data->tt=$time;
	$datajson = json_encode($data);
	echo $datajson;
?>