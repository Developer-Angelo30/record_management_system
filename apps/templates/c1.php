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
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/printable-design.css"  media="print" >
    <title>Document</title>
</head>
<body>
    <section id="c1-template" >
    <div class="printable-holder">
        <div class="printable" id="printable" >
            <table width="100%" >
            <tr>
        <td colspan="10">I PERSONAL INFORMATION</td>
    </tr>
    <tr>
        <td colspan="3" >SURNAME</td>
        <td colspan="7" >aa</td>
    </tr>
            </table>
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