<?php
session_start();
require_once("./apps/database/connection.php");

if(isset($_SESSION['email']) && isset($_SESSION['password']) ){

    $email = mysqli_real_escape_string(DB::DBconnection() , $_SESSION['email']);
    $password = mysqli_real_escape_string(DB::DBconnection() , $_SESSION['password']);

    $sql = "SELECT * FROM `faculty` WHERE FacultyEmail = '$email' AND FacultyPassword = '$password' AND FacultyDeleted = 1 ";
    $result = DB::DBconnection()->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return ($row['FacultyRole'] == 1) ? header("location: ./apps/admin/dashboard.php"): header("location: ./apps/faculty/dashboard.php") ;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/all.css">
    <title>Document</title>
</head>
<body>
    <section id="wrapper-login" class="d-flex justify-content-center align-items-center" >
        <div class="center bg-white p-5 ">
            <div class="text-center">
                <img src="./assets/images/icon.gif" height="150px" width="150px" alt="">
            </div>
            <form id="loginForm" >
                <h5 class="text-uppercase text-center mt-2" >Faculty Record Management System</h5> <hr>
                <div class="input-group mt-3">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <small class="text-danger error-message error-username" ></small>
                <div class="input-group mt-3">
                    <input type="text" class="form-control" name="email" placeholder="Email Address">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <small class="text-danger error-message error-email" ></small>
                <div class="input-group mt-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="input-group-text"><i class="fa fa-eye"></i></span>
                </div>
                <small class="text-danger error-message error-password " ></small>
                <div class="text-center mt-3">
                    <div class="form-group">
                        <button type="submit" class="btn bg-primary text-white fw-bold w-75" >Log In</button>
                    </div>
                    <a href="registration.php">You don't have account? <span class="text-danger" >Sign Up here</span> </a>
                </div>
            </form>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/a37dfd209c.js" crossorigin="anonymous"></script>
<script src="./assets/js/customs.js"></script>
</body>
</html>