<?php
session_start();
require_once("../database/connection.php");
require_once("../log.php");
    
    function updatePersonal(){

        $profile = $_FILES['profile']['name'];
        $profileTmp = $_FILES['profile']['tmp_name'];

        $email = $_SESSION['email'];

        $ext = explode('.', strtolower($profile));
        $validExt = array("png", "jpg" , "jpeg");

        $path = "../../assets/images/profile/";
        $profileNewName= $path.$email.".".end($ext);

        $username = mysqli_real_escape_string(DB::DBconnection(), $_POST['username']);
        $fullname = mysqli_real_escape_string(DB::DBconnection(), $_POST['fullname']);
        $gender = mysqli_real_escape_string(DB::DBconnection(), $_POST['gender']);
        $status = mysqli_real_escape_string(DB::DBconnection(), $_POST['civil-status']);
        $occupational = mysqli_real_escape_string(DB::DBconnection(), $_POST['occupational']);
        $position = mysqli_real_escape_string(DB::DBconnection(), $_POST['position']);
        $religion = mysqli_real_escape_string(DB::DBconnection(), $_POST['religion']);
        $phone = mysqli_real_escape_string(DB::DBconnection(), $_POST['contact-number']);

        if(!empty($fullname) && !empty($gender) && !empty($status) && !empty($occupational) && !empty($religion) && !empty($phone) ){
            
            if(!empty($profile)){
                if(in_array(end($ext), $validExt)){
                
                    $sql = "UPDATE `faculty` SET 
                        `FacultyUsername`='$username',
                        `FacultyFullname`='$fullname',
                        `FacultyGender`= '$gender',
                        `FacultyCivilStatus` = '$status',
                        `FacultyOccupational` = '$occupational',
                        `FacultyPosition` = '$position',
                        `FacultyReligion` = '$religion',
                        `FacultyPhone` = '$phone',
                        `FacultyProfile` = '$profileNewName'
                     WHERE FacultyEmail = '$email' ";
                
                }
                else{
                    $output =  json_encode(array("status"=>false, "message"=>"Please upload PNG <JPEG , JPG File image extension."));
                }
            }
            else{
                $sql = "UPDATE `faculty` SET 
                        `FacultyUsername`='$username',
                        `FacultyFullname`='$fullname',
                        `FacultyGender`= '$gender',
                        `FacultyCivilStatus` = '$status',
                        `FacultyOccupational` = '$occupational',
                        `FacultyPosition` = '$position',
                        `FacultyReligion` = '$religion',
                        `FacultyPhone` = '$phone'
                    WHERE FacultyEmail = '$email' ";
            }

            $result = DB::DBconnection()->query($sql);
            if($result){
                move_uploaded_file($profileTmp, "$profileNewName");
                log::logs("Successfully updated personal information.");
                DB::DBclose();
                $output = json_encode(array("status"=>true));
            }
        }
        else{
            log::logs("Failed to updated personal information.");
            $output = json_encode(array("status"=>false, "message"=>"Please Input all required inputs"));
        }

        DB::DBclose();
        return $output;

        
    }

    echo updatePersonal();

?>