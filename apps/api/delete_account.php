<?php

session_start();
require_once("../database/connection.php");
require_once("../validation/validation.php");
require_once("../encrypt/encrypt.php");
require_once("../log.php");

$email = $_SESSION['email'];
$password = Hash::Password(mysqli_real_escape_string(DB::DBconnection(), $_POST['password']));


$check = "SELECT * FROM `faculty` WHERE `FacultyEmail`= '$email' AND `FacultyPassword`= '$password' AND `FacultyDeleted` = 1;";
$result_check = DB::DBconnection()->query($check);
if($result_check->num_rows > 0){
    $update = "UPDATE `faculty` SET `FacultyDeleted`= 0 WHERE FacultyEmail = '$email' ";
    $result = DB::DBconnection()->query($update);
        
    if($result){
        log::logs("Delete account ".$email);
            echo json_encode(array("status"=>true , "message"=>"../../logout.php"));
    }
    else{
        log::logs("something error in deletingaccount ");
    }
}
else{
    log::logs("something error in deleting account ");
    echo json_encode(array("status"=>false , "message"=>"Incorrect Password"));
}


?>