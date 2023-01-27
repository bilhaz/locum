<?php

if (!function_exists('encryptIt')) {

    function encryptIt($q) {

//         $config    = new \Config\Encryption(); 
//        $encrypter = \Config\Services::encrypter($config);
//        return $encrypter->encrypt(base64_encode($q));
//        return $q;
        
        
        
        // Store the cipher method
        $cipher = "AES-256-CBC";

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = ENCRYPTION_IV;

        // Store the encryption key
        $encryption_key = ENCRYPTION_KEY;

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($q, $cipher, $encryption_key, $options=0, $encryption_iv);

        // return encrypted data
        return base64_encode($encryption);
    }

}
if (!function_exists('decryptIt')) {

    function decryptIt($q) {

//         decode the encrepted data
//        $ciphertext = base64_decode($q);
//        $config = new \Config\Encryption();
//
//        $encrypter = \Config\Services::encrypter($config);
//        return $encrypter->decrypt($ciphertext);
//        return $q;
        
        
        
        
        // decode the encrepted data
        $q = base64_decode($q);

        // Store the cipher method
        $cipher = "AES-256-CBC";

        // Non-NULL Initialization Vector for encryption
        $decryption_iv = ENCRYPTION_IV;

        // Store the decryption key
        $decryption_key = ENCRYPTION_KEY;

        // Use openssl_decrypt() function to decrypt the data
        $decryption = openssl_decrypt($q, $cipher, $decryption_key, $options=0, $decryption_iv);

        // return decrypted data
        return $decryption;
    }

}
