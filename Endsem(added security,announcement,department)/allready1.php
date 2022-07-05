<?php
	require_once "phpseclib/Crypt/RSA.php";

function decrypt($cipher,$string, $private_key)
{
    $cipher->loadKey($private_key);
	$string=base64_decode($string);
    $cipher->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
    return $cipher->decrypt($string);
}
$rsa = new Crypt_RSA();
$cireg = $_GET['cireg'];
$cipass = $_GET['cipass'];
$citstamp = $_GET['citstamp'];
$alreadyprik = fopen("alreadyprik.txt","r");
$rsa->loadKey(fread($alreadyprik,filesize("alreadyprik.txt")));
$privatekey = $rsa->getPrivateKey();
$decireg = decrypt($rsa,$cireg, $privatekey);
$decipass = decrypt($rsa,$cipass, $privatekey);
$decitstamp = decrypt($rsa,$citstamp,$privatekey);
	if(idate('U')-$decitstamp <= 1)
{
	$db = new PDO('mysql:host=localhost;dbname=ovs', 'root', '');
	session_start();
		$aid = $decireg;
		$password = $decipass;
		$sql = "SELECT aid,pass FROM admin where aid = :aid and pass = :password ";
		$pre = $db->prepare($sql);
		$pre->bindParam(':aid',$aid);
		$pre->bindParam(':password',$password);
			$pre->execute();
			$r=$pre->fetch(PDO::FETCH_ASSOC);
		    $count=$pre->rowCount();
			if ($count > 0) {
					
						$_SESSION["username"] = $r['aid'];
						echo $_SESSION["username"];
						$db = null;
					header("Location: eleadmin.php"); 
					
				} else {
    				echo "<script>alert('Invalid Username Or Password.');</script>";
					echo "<h3>Redirecting To Login Page. Please Wait.......</h3>";
					$db = null;
			header("Refresh:0.5;url=adminlog.php");
}
		}
		else
		{
			echo "<h2>User Session Has Been Expired.</h2>";
			header("Refresh:2;url=adminlog.php");
		}
	
?>

