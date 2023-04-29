<?php
session_start();
require_once("../database/connection.php");
require_once("../validation/validation.php");
require_once("../encrypt/encrypt.php");

function updateEmail(){
    $email = mysqli_real_escape_string(DB::DBconnection(), $_POST['email']);
    $newEmail = mysqli_real_escape_string(DB::DBconnection(), $_POST['new-email']);
    $password = mysqli_real_escape_string(DB::DBconnection(), $_POST['password']);

    $passwordHashed = Hash::Password($password);

    $sql_check = "SELECT * FROM faculty WHERE FacultyEmail = '$email' AND FacultyPassword = '$passwordHashed' AND FacultyDeleted = 1 ";
    $result_check = DB::DBconnection()->query($sql_check);
    if($result_check->num_rows > 0){
        $update = "UPDATE `faculty` SET `FacultyEmail`='$newEmail' WHERE `FacultyEmail`='$email' ";
        $result = DB::DBconnection()->query($update);
        if($result){
            DB::DBclose();
            return json_encode(array("status"=>true, "message"=>"../../logout.php"));
        }
    }
    else{
        return json_encode(array("status"=>false,"message"=>"Your new email address is already registered!"));
    }
    
}
echo updateEmail();

?>