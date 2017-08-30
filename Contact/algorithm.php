<?php 

$key = 'fbgJFBfd&%gkdsfdfbgJFBf#@jgkdsfd';

function encrypt($data, $key){
    return base64_encode(
    mcrypt_encrypt(
        MCRYPT_RIJNDAEL_128,
        $key,
        $data,
        MCRYPT_MODE_CBC,
        "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"));
}

function decrypt($data, $key){
    $decode = base64_decode($data);
    return mcrypt_decrypt(
                    MCRYPT_RIJNDAEL_128,
                    $key,
                    $decode,
                    MCRYPT_MODE_CBC,
                    "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
            );
   
}

 function Encryption($data)
{
    return encrypt($data,$GLOBALS['key']);
}

function Decryption($data)
{
    return decrypt($data,$GLOBALS['key']);
}

 ?>