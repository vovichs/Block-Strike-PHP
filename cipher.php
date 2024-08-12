<?php

function encrypt($data) 
{
   $plaintext = $data;
   $password = 'dcb3c7f25b72098342ffc802ef083d61';
   $method = 'aes-256-cbc';
   $key = substr(hash('sha256', $password, true), 0, 32);
   $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
   $encrypted = base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));
   return $encrypted;
}

function decrypt($data) 
{
   $plaintext = $data;
   $password = 'dcb3c7f25b72098342ffc802ef083d61';
   $method = 'aes-256-cbc';
   $key = substr(hash('sha256', $password, true), 0, 32);
   $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
   $decrypted = openssl_decrypt(base64_decode($plaintext), $method, $key, OPENSSL_RAW_DATA, $iv);
   return $decrypted;
}

function encrypt_with_key($data, $skey) 
{
   $plaintext = $data;
   $password = $skey;
   $method = 'aes-256-cbc';
   $key = substr(hash('sha256', $password, true), 0, 32);
   $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
   $encrypted = base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));
   return $encrypted;
}

function decrypt_with_key($data, $skey) 
{
   $plaintext = $data;
   $password = $skey;
   $method = 'aes-256-cbc';
   $key = substr(hash('sha256', $password, true), 0, 32);
   $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
   $decrypted = openssl_decrypt(base64_decode($plaintext), $method, $key, OPENSSL_RAW_DATA, $iv);
   return $decrypted;
}

?>