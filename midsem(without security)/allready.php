<?php
	$username = "";
	$email = "";
	$errors = "";
	$db = mysqli_connect('localhost','root','','ovs');
		session_start();
	if (isset($_POST['login'])) {
		$reg = $_POST['reg'];
		$password = $_POST['Password'];
		$sql = "SELECT regid,password FROM users where regid = '$reg' and password = '$password' ";
			$r=mysqli_query($db, $sql);
			if (mysqli_num_rows($r) > 0) {
					
						$_SESSION["username"] = "$username";
					header("Location: student.php"); 
				} else {
    				echo "<script>alert('Invalid Username Or Password.');</script>";
					echo "<h3>Redirecting To Login Page. Please Wait.......</h3>";
			header("Refresh:0.5;url=studentlog.php");
}
		}
	
?>

