<?php

class Validation{

    public static function Email($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return filter_var($email , FILTER_SANITIZE_EMAIL );
        }
        else{
            return false;
        }
    }
    
    public static function Numeric($value){
        $pattern = "/^[0-9]+$/";
        return (preg_match($pattern, $value))?true:false;
    }

    public static function AlphaSpace($value){
        $pattern = "/^[A-Za-z\s]+$/";
        return (preg_match($pattern, $value))?true:false;
    }

    public static function Phone($phone){
        $pattern = "/^[0-9]{10}+$/";

        if(preg_match($pattern,$phone)){
            if(strlen($phone) == 10){
                return $phone;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

}

?>