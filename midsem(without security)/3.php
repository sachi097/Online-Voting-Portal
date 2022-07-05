<?php
    session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database="ovs";
	$con=mysqli_connect($servername,$username,$password,$database);
	$tab=$_SESSION['votingpos'];
	$tab=strtolower($tab);
	$tab=str_replace(' ','_',$tab);
	$nom=$_POST['vote'];
	$voterdept=$_SESSION['voterdept'];
	$voter=$_SESSION['voter'];
	$sql="select * from $tab where regnum = '$nom' ";
	$result=mysqli_query($con,$sql);
	$res=mysqli_fetch_assoc($result);
	$count=$res[$voterdept];
	$sql="update $tab set $voterdept = $count+1 where regnum = '$nom' ";
	$result=mysqli_query($con,$sql);
	$sql="insert into votes(user,pos) values('$voter','$tab')";
	$result=mysqli_query($con,$sql);
	echo "Thank You For Casting Your Vote. Please Wait Redirecting To Home Page........ ";
	header("Refresh:2;url=student.php");
?>