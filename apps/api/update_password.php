<?php
session_start();
require_once("../database/connection.php");
require_once("../validation/validation.php");
require_once("../encrypt/encrypt.php");

function updatePasswor(){

    $email = $_SESSION['email'];

    $current = mysqli_real_escape_string(DB::DBconnection(), $_POST['old-password']);
    $new = mysqli_real_escape_string(DB::DBconnection(), $_POST['new-password'] );
    $confirm = mysqli_real_escape_string(DB::DBconnection(), $_POST['confirm-password'] );

    $hashed = Hash::Password($new);

    if(!empty($current) && !empty($new) && !empty($confirm) ){
        if($new === $confirm){
            $sql = "UPDATE `faculty` SET`FacultyPassword`='$hashed' WHERE `FacultyEmail`= '$email' AND `FacultyDeleted` = 1 ";
            $result = DB::DBconnection()->query($sql);
            if($result){
                DB::DBclose();
                return json_encode(array("status"=>true , "error"=>"", "message"=>"../../logout.php"));
            }
        }
        else{
            return json_encode(array("status"=>false , "error"=>"", "message"=>"New Password not matched!"));
        }
    }
    else{
        return json_encode(array("status"=>false , "error"=>"", "message"=>"Input fields are empty!"));
    }

}
echo updatePasswor();

?>