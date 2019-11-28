<?php

class EncryptionComponent extends Component {
    
    //    function to encrypt
    function encrypt($string, $key = ENCRYPTIONKEY){
            $result = "";
            for($i=0; $i<strlen($string); $i++){
                    $char = substr($string, $i, 1);
                    $keychar = substr($key, ($i % strlen($key))-1, 1);
                    $char = chr(ord($char)+ord($keychar));
                    $result.=$char;
            }
            $salt_string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxys0123456789!@#$%^&*=.,";
            $length = rand(1, 15);
            $salt = "";
            for($i=0; $i<=$length; $i++){
                    $salt .= substr($salt_string, rand(0, strlen($salt_string)), 1);
            }
            $salt_length = strlen($salt);
            $end_length = strlen(strval($salt_length));
            return base64_encode($result.$salt.$salt_length.$end_length);
    }

    //    function to decrypt
    function decrypt($string, $key = ENCRYPTIONKEY){
            $result = "";
            $string = base64_decode($string);
            $end_length = intval(substr($string, -1, 1));
            $string = substr($string, 0, -1);
            $salt_length = intval(substr($string, $end_length*-1, $end_length));
            $string = substr($string, 0, $end_length*-1+$salt_length*-1);
            for($i=0; $i<strlen($string); $i++){
                    $char = substr($string, $i, 1);
                    $keychar = substr($key, ($i % strlen($key))-1, 1);
                    $char = chr(ord($char)-ord($keychar));
                    $result.=$char;
            }
            return $result;
    }

}

