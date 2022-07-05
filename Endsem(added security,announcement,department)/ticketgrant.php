<?php
require_once "phpseclib/Crypt/RSA.php";

function decrypt($cipher,$string, $private_key)
{
    $cipher->loadKey($private_key);
	$string=base64_decode($string);
    $cipher->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
    return $cipher->decrypt($string);
}
$ciquery=$_GET['ciquery'];
$rsa = new Crypt_RSA();
$alreadyprik = fopen("studentprik.txt","r");
$rsa->loadKey(fread($alreadyprik,filesize("studentprik.txt")));
$privatekey = $rsa->getPrivateKey();
$query = decrypt($rsa,$ciquery,$privatekey);
//echo $query;
header("Location: allready.php?$query");
?>