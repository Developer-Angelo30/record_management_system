<?php
require_once("../database/connection.php");
require_once("../validation/validation.php");
require_once("../encrypt/encrypt.php");
require_once("../log.php");

function createAccount(){
    $username = mysqli_real_escape_string(DB::DBconnection(), $_POST['username']);
    $email = mysqli_real_escape_string(DB::DBconnection(), $_POST['email']);
    $fullname = mysqli_real_escape_string(DB::DBconnection(), $_POST['fullname']);
    $gender = mysqli_real_escape_string(DB::DBconnection(), $_POST['gender']);
    $civilStatus = mysqli_real_escape_string(DB::DBconnection(), $_POST['civil-status']);
    $occupational = mysqli_real_escape_string(DB::DBconnection(), $_POST['occupational']);
    $position = mysqli_real_escape_string(DB::DBconnection(), $_POST['position']);
    $religion = mysqli_real_escape_string(DB::DBconnection(), $_POST['religion']);
    $phone = mysqli_real_escape_string(DB::DBconnection(), $_POST['contact-number']);
    $password = mysqli_real_escape_string(DB::DBconnection(), $_POST['password']);
    $confirm = mysqli_real_escape_string(DB::DBconnection(), $_POST['confirm-password']);

    $hashedPassword = Hash::Password($password);

    if($password  === $confirm){
        if(!empty($username)){
            if(!empty($email)){
                if(!empty($fullname)){
                    if(!empty($gender) && $gender == "male" || $gender == "female" ){
                        if(!empty($civilStatus) && $civilStatus == "Single" || $civilStatus == "Married" ||  $civilStatus == "Widowed" ||  $civilStatus == "Divorced" ){
                            if(!empty($occupational)){
                                if(!empty($religion)){
                                    if(!empty($phone)){
                                        if(!empty($password)){
    
                                            //validate email
                                            if(Validation::Email($email)){
                                                $validationContact = Validation::Phone($phone);
    
                                                if($validationContact != false){
                                                    if(strlen($password) >= 8){
                                                        $sql_check = "SELECT `FacultyEmail` FROM `faculty` WHERE FacultyEmail = '$email' ";
                                                        $result_check = DB::DBconnection()->query($sql_check);
                                                        if($result_check->num_rows == 0){
                                                            $sql = "INSERT INTO `faculty`(
                                                                        `FacultyUsername` ,
                                                                        `FacultyEmail` ,
                                                                        `FacultyFullname` ,
                                                                        `FacultyGender` ,
                                                                        `FacultyCivilStatus` ,
                                                                        `FacultyOccupational` ,
                                                                        `FacultyPosition` ,
                                                                        `FacultyReligion` ,
                                                                        `FacultyPhone` ,
                                                                        `FacultyPassword` ,
                                                                        `FacultyProfile` ,
                                                                        `FacultyRole`,
                                                                        `FacultyDeleted`
                                                                    ) VALUES (
                                                                        '$username',
                                                                        '$email' ,
                                                                        '$fullname' ,
                                                                        '$gender' ,
                                                                        '$civilStatus' ,
                                                                        '$occupational' ,
                                                                        '$position' ,
                                                                        '$religion' ,
                                                                        '$phone' ,
                                                                        '$hashedPassword' ,
                                                                        '../../assets/images/profile/profile.png',
                                                                        0,
                                                                        1
                                                                    )";
                                                            $result = DB::DBconnection()->query($sql);
                                                            if($result){
                                                                log::logs("creating account.");
                                                                $output =  json_encode(array("status"=>true , "error"=>"" , "message"=> "Successfully Registered!"));
                                                            }
                                                        }
                                                        else{
                                                            log::logs("failed creating account. email already exist");
                                                            $output =  json_encode(array("status"=>false , "error"=>"" , "message"=> "Email Address is already registered."));
                                                        }
                                                    }
                                                    else{
                                                        $output =  json_encode(array("status"=>false , "error"=>"password" , "message"=> "Password must be atleast 8 characters."));
                                                    }
                                                }
                                                else{
                                                    $output =  json_encode(array("status"=>false , "error"=>"contact-number" , "message"=> "Please input a valid contact number."));
                                                }
                                            }
                                            else{
                                                $output =  json_encode(array("status"=>false , "error"=>"email" , "message"=> "Please input a valid email address."));
                                            }
                                        }
                                        else{
                                            $output =  json_encode(array("status"=>false , "error"=>"password" , "message"=> "Please input password."));
                                        }
                                    }
                                    else{
                                        $output =  json_encode(array("status"=>false , "error"=>"contact-number" , "message"=> "Please input contact number."));
                                    }
                                }
                                else{
                                    $output =  json_encode(array("status"=>false , "error"=>"occupation" , "message"=> "Please input religion."));
                                }
                            }
                            else{
                                $output =  json_encode(array("status"=>false , "error"=>"occupation" , "message"=> "Please input Occupation."));
                            }
                        }
                        else{
                            $output =  json_encode(array("status"=>false , "error"=>"" , "message"=> "Do not modify inspect element"));
                        }
                    }
                    else{
                        $output =  json_encode(array("status"=>false , "error"=>"" , "message"=> "Do not modify inspect element"));
                    }
                }
                else{
                    $output =  json_encode(array("status"=>false , "error"=>"fullname" , "message"=> "Please input Fullname"));
                }
            }
            else{
                $output =  json_encode(array("status"=>false , "error"=>"email" , "message"=> "Please input email Address"));
            }
        }
        else{
            $output =  json_encode(array("status"=>false , "error"=>"username" , "message"=> "Please Input Username."));
        }
    }
    else{
        $output =  json_encode(array("status"=>false , "error"=>"confirm-password" , "message"=> "Password is not matched."));
    }
    DB::DBclose();
    return $output;
}
echo createAccount();

?>