<?php
  require_once "phpseclib/Crypt/RSA.php";
  $rsa = new Crypt_RSA();
  $rsa->setPrivateKeyFormat(CRYPT_RSA_PRIVATE_FORMAT_PKCS1);
  $rsa->setPublicKeyFormat(CRYPT_RSA_PUBLIC_FORMAT_PKCS1);
  $privatekey=$rsa->getPrivateKey();
  $publickey=$rsa->getPublicKey();
  extract($rsa->createKey());
  echo $privatekey;
  echo "<br><br>";
  echo $publickey;
?>