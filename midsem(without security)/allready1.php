<?php
	$username = "";
	$email = "";
	$errors = "";
	$db = mysqli_connect('localhost','root','','ovs');
		session_start();
	if (isset($_POST['login'])) {
		$aid = $_POST['reg'];
		$password = $_POST['Password'];
		$sql = "SELECT aid,pass FROM admin where aid = '$aid' and pass = '$password' ";
			$r=mysqli_query($db, $sql);
			if (mysqli_num_rows($r) > 0) {
					
						$_SESSION["username"] = "$username";
					header("Location: eleadmin.php");
				} else {
    				echo "<script>alert('Invalid Username Or Password.');</script>";
					echo "<h3>Redirecting To Login Page. Please Wait.......</h3>";
			header("Refresh:0.5;url=adminlog.php");
}
		}
	
?>

