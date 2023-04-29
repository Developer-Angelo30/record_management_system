<?php
session_start();
require_once("../database/connection.php");

if(isset($_SESSION['email']) && isset($_SESSION['password']) ){

    $email = mysqli_real_escape_string(DB::DBconnection() , $_SESSION['email']);
    $password = mysqli_real_escape_string(DB::DBconnection() , $_SESSION['password']);

    $sql = "SELECT * FROM `faculty` WHERE FacultyEmail = '$email' AND FacultyPassword = '$password' AND FacultyDeleted = 1 ";
    $result = DB::DBconnection()->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($row['FacultyRole'] != 0){
                header("location: ../admin/dashboard.php");
        }
    }
    else{
        header("location: ../../logout.php");
    }
    
    $sql = "SELECT * FROM faculty WHERE FacultyEmail = '$email' ";
    $result = DB::DBconnection()->query($sql);

    $row = $result->fetch_assoc();
    $username = $row['FacultyUsername'];
    $fullname = $row['FacultyFullname'];
    $civilStatus = $row['FacultyCivilStatus'];
    $occupational = $row['FacultyOccupational'];
    $position = $row['FacultyPosition'];
    $religion = $row['FacultyReligion'];
    $contact = $row['FacultyPhone'];
    $profile = $row['FacultyProfile'];
}
else{
    header("location: ../../logout.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/demo.css">
    <link rel="stylesheet" href="../../assets/css/printable-design.css"  media="print" >
    <title>Document</title>
</head>
<body>
    <section id="c1-template" >
    <div class="data">
         <h1>NOT BERLONG</h1>
    </div>
    <div class="printable-holder">
        <div class="printable" id="printable" >
            <div class="content-print">
                <table>
                        <tr class="" >
                            <td colspan="9" ><small class="d-flex" >Print legibly. Tick appropriate boxes([]) and use separate sheet if necessary. Indicate N/A if not applicable. <strong>DO NOT ABBREVIATE</strong> </small></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><span><small>1. CS ID No.</small></span></td>
                            <td colspan="3" class="text-end" ><small>(Do not fill up. For CSC use only)</small></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="" >
                            <td colspan="13" ><small >I. PERSONAL INFORMATION</small></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="" >
                            <td width="15px" ><small>2</small></td>
                            <td colspan="2" ><small >SURNAME</small></td>
                            <td></td>
                            <td colspan="11"  ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="" >
                            <td width="15px" ><small></small></td>
                            <td colspan="2" ><small >FIRSTNAME</small></td>
                            <td></td>
                            <td colspan="11" ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="3"  class="bg-secondary" style="border:1px solid black;" ></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="" >
                            <td width="15px" ><small></small></td>
                            <td colspan="2" ><small >LASTNAME</small></td>
                            <td></td>
                            <td colspan="11" ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="15px" ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="" ><small >3 DATE OF BIRTH <br>((mm/dd/yyyy))</small></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="3" rowspan="3" class="bg-secondary" ><small>16. CITIZENSHIP <br></small></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                </table>

                
            </div>
        </div>
    </div>

    </section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/a37dfd209c.js" crossorigin="anonymous"></script>
<script src="../../assets/js/customs.js"></script>
</body>
</html>