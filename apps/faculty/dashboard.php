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
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/global.css">
    <title>Document</title>
</head>
<body>
    <section id="wrapper-faculty-dashboard">
        <div class="sidebar">
            <div class="text-center img-box">
                <img src="../../assets/images/profile.png" alt="">
                <h4 class="mt-2 text-white" >Juan Dela Cruz</h4>
            </div>
            <ul class="list-unstyled" >
                <a href="#home" class="text-decoration-none " ><li> <i class="fa fa-home" ></i> Home</li></a>
                <a href="#template" class="text-decoration-none " ><li> <i class="fa fa-file-text-o" ></i> Template</li></a>
                <a href="#announcement" class="text-decoration-none " ><li> <i class="fa fa-bullhorn" ></i> Announcement</li></a>
                <a href="#seminar" class="text-decoration-none " ><li> <i class="fa fa-users" ></i> Seminar</li></a>
                <a href="#setting" class="text-decoration-none " ><li> <i class="fa fa-cog" ></i> Setting</li></a>
                <a href="../../logout.php" class="text-decoration-none " ><li> <i class="fa fa-sign-out" ></i> Logout</li></a>
            </ul>
        </div>
        <div class="content">
            <nav class="d-flex align-items-center" >
                <h2 class="text-white ps-5" >NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</h2>
            </nav>
            <section class="content-section" id="home" >
                <div class="welcome-box" >
                    <span class="text1">Welcome</span>
                    <span class="text2">User</span>
                    <span class="text3">to</span>
                    <span class="text4 text-uppercase">faculty record management</span>
                </div>
            </section>
            <section class="content-section" id="template" >
                template
            </section>
            <section class="content-section" id="announcement" >
                <!-- announcement -->
                <div class="bg-bg=light shadow p-5 " >
                    <div class="navbar">
                        <h1>Title</h1>
                        <small>march 30 2001</small>
                    </div><hr>
                </div>
                <div class="bg-bg=light shadow p-5 " >
                    <div class="navbar">
                        <h1>Title</h1>
                        <small>march 30 2001</small>
                    </div><hr>
                </div>
                <div class="bg-bg=light shadow p-5 " >
                    <div class="navbar">
                        <h1>Title</h1>
                        <small>march 30 2001</small>
                    </div><hr>
                </div>
            </section>
            <section class="content-section" id="seminar" >
                seminar
            </section>
            <section class="content-section" id="setting" >
                <div class="bg-light w-100 p-5 shadow container-fluid ">
                    <div class="row">
                        <div class="col-sm-6 p-3">
                            <h4 class="text-uppercase" >Personal Information</h4><hr>
                            <div class="row">
                                <form id="updatePersonalForm"  enctype="multipart/form-data" >
                                    <div class="col-sm-4">
                                        <input type="file" name="profile" id="image" style="display:  none;" >
                                        <label for="image"   class=" cursor-pointer">
                                            <img   class="mt-5"  src="../../assets/images/profile.png" height="200px" alt="" >
                                        </label>
                                    </div>
                                <div class="col-sm-6">
                                    <div class="input-group mt-3">
                                        <input type="text" name="fullname" class="form-control" placeholder="Fullname">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <small class="text-danger error-message error-fullname" ></small>
                                    <div class="form-group mt-3 d-flex">
                                        <label for="">Gender</label>
                                        <div class="form-check ">
                                            <input class="form-check-input" value="male" type="radio" name="gender" checked>
                                            <label class="form-check-label" for="gender">
                                            male
                                            </label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" value="female" type="radio" name="gender" >
                                            <label class="form-check-label" for="gender">
                                            Female
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <select class="form-select" name="civil-status" >
                                            <option selected value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>
                                    <div class="input-group mt-3">
                                        <input type="text" class="form-control" name="occupational" placeholder="Occupational">
                                        <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                                    </div>
                                    <small class="text-danger error-message error-occupation" ></small>
                                    <div class="input-group mt-3">
                                        <input type="text" class="form-control" name="religion" placeholder="Religion">
                                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                                    </div>
                                    <small class="text-danger error-message error-religion" ></small>
                                    <div class="input-group mt-3">
                                        <input type="text" class="form-control" name="contact-number" placeholder="Contact Number">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <small class="text-danger error-message error-contact-number " ></small>
                                    <div class="text-end mt-3">
                                        <button type="submit" class="btn btn-primary" >Update</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6 p-3">
                            <h4 class="text-uppercase" >Update Email</h4><hr>
                            <form id="updateEmailForm">
                                <div class="form-group mt-3">
                                    <input type="text" name="email" class="form-control" placeholder="Old Email Address" >
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" name="new-email" class="form-control" placeholder="New Email Address" >
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" name="password" class="form-control" placeholder="Password" >
                                </div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary" >Update</button>
                                </div>
                            </form><br><br>
                            <h4 class="text-uppercase" >Update Password</h4><hr>
                            <form id="updatePasswordForm">
                                <div class="form-group mt-3">
                                    <input type="password" name="old-password" class="form-control" placeholder="Current Password" >
                                </div>
                                <div class="form-group mt-3">
                                    <input type="password" name="new-password" class="form-control" placeholder="New Password" >
                                </div>
                                <div class="form-group mt-3">
                                    <input type="password" name="confirm-password" class="form-control" placeholder="Confirm New Password" >
                                </div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary" >Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/a37dfd209c.js" crossorigin="anonymous"></script>
<script src="../../assets/js/demo.js"></script>
</body>
</html>