<?php
session_start();
require_once("../database/connection.php");
require_once("../validation/validation.php");
require_once("../encrypt/encrypt.php");
require_once("../log.php");

function loginAccount(){
    
    $username = mysqli_real_escape_string(DB::DBconnection(), $_POST['username']);
    $email = mysqli_real_escape_string(DB::DBconnection(), $_POST['email']);
    $password = mysqli_real_escape_string(DB::DBconnection(), $_POST['password']);

    $hashedPassword = Hash::Password($password);

    if(!empty($username)){
        if(!empty($email)){
            if(!empty($password)){
                if(Validation::Email($email)){
                    $sql = "SELECT * FROM `faculty` WHERE FacultyUsername = '$username' AND FacultyEmail = '$email' AND FacultyPassword = '$hashedPassword' AND FacultyDeleted = 1 ";
                    $result = DB::DBconnection()->query($sql);
                    if($result->num_rows > 0){
                        $row = $result->fetch_assoc();
    
                        $_SESSION['email'] = $row['FacultyEmail'];
                        $_SESSION['password'] = $row['FacultyPassword'];
                        log::logs("login account.");
                        $output = ($row['FacultyRole'] == 1) ? json_encode(array("status"=>true, "message"=>"./apps/admin/dashboard.php")):json_encode(array("status"=>true, "message"=>"./apps/faculty/dashboard.php"));
                    }
                    else{
                        log::logs("trying to login.");
                        $output = json_encode(array("status"=>false, "error"=>"" , "message"=>"Wrong credential!"));
                    }
                }
                else{
                    $output = json_encode(array("status"=>false, "error"=>"email" , "message"=>"Please input valid email address"));
                }
            }
            else{
                $output = json_encode(array("status"=>false, "error"=>"password" , "message"=>"Please input password"));
            }
        }
        else{
            $output = json_encode(array("status"=>false, "error"=>"email" , "message"=>"Please input email address"));
        }
    }
    else{
        $output =  json_encode(array("status"=>false, "error"=>"username" , "message"=>"Please input username"));
    }
    DB::DBclose();
    return $output;
}
echo loginAccount();


?>