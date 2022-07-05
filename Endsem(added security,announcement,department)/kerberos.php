<?php require_once "phpseclib/Crypt/RSA.php";

function encrypt($cipher,$string, $public_key)
{
    $cipher->loadKey($public_key);
    $cipher->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
    return base64_encode($cipher->encrypt($string));
}
 
$rsa = new Crypt_RSA();
$reg = $_GET['reg'];
$pass = $_GET['pass'];
$studentpubk = $_GET['senderpubk'];
$alreadypubk = $_GET['reciverpubk'];
$rsa->setPrivateKeyFormat(CRYPT_RSA_PRIVATE_FORMAT_PKCS1);
$rsa->setPublicKeyFormat(CRYPT_RSA_PUBLIC_FORMAT_PKCS1);
$rsa->loadKey($alreadypubk);
$rsa->setPublicKey();
$publickeyalready = $rsa->getPublicKey();
$cireg = encrypt($rsa,$reg, $alreadypubk);
$cipass = encrypt($rsa,$pass,$alreadypubk);
$tstamp = idate("U");
$citstamp = encrypt($rsa,$tstamp,$alreadypubk) ;
$query = array(
		"cireg"=>$cireg,
		"cipass"=>$cipass,
		"citstamp"=>$citstamp
		);
$query = http_build_query($query);
$rsa->loadKey($studentpubk);
$rsa->setPublicKey();
$publickeystudent = $rsa->getPublicKey();
$ciquery = encrypt($rsa,$query, $publickeystudent);
$data = new stdClass();
$ciquery = array(
       "ciquery" => $ciquery
	   );
$ciquery = http_build_query($ciquery);
$data->ciquery =$ciquery;
$datajson = json_encode($data);
echo $datajson;
?>