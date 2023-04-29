<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/demo.css">
    <title>Document</title>
</head>
<body>
    <section id="wrapper-register" class="d-flex justify-content-center align-items-center" >
        <div class="center bg-white p-5 ">
            <div class="text-center">
                <img src="./assets/images/icon.gif" height="150px" width="150px" alt="">
            </div>
            <form id="registerForm" >
                <h5 class="text-uppercase text-left" >Create Account</h5> <hr>
                <div class="input-group mt-3">
                    <input type="text" name="username" class="form-control" placeholder="username">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <small class="text-danger error-message error-username" ></small>
                <div class="input-group mt-3">
                    <input type="text" name="email" class="form-control" placeholder="Email Address">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <small class="text-danger error-message error-email" ></small>
                <div class="input-group mt-3">
                    <input type="text" name="fullname" class="form-control" placeholder="Fullname">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <small class="text-danger error-message error-fullname" ></small>
                <div class="form-group mt-3 d-flex">
                    <label for="">Gender</label>
                    <div class="form-check ">
                        <input class="form-check-input" value="male" type="radio" name="gender">
                        <label class="form-check-label" for="gender">
                          male
                        </label>
                      </div>
                      <div class="form-check ">
                        <input class="form-check-input" value="female" type="radio" name="gender" checked>
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
                <div class="form-group mt-3">
                    <select class="form-select" name="position" >
                        <option selected value="Instructor" selected >Instructor</option>
                      </select>
                </div>
                <div class="input-group mt-3">
                    <input type="text" class="form-control" name="contact-number" placeholder="Contact Number">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <small class="text-danger error-message error-contact-number " ></small>
                <div class="input-group mt-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="input-group-text"><i class="fa fa-eye"></i></span>
                </div>
                <small class="text-danger error-message error-password" ></small>
                <div class="input-group mt-3">
                    <input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password">
                    <span class="input-group-text"><i class="fa fa-eye"></i></span>
                </div>
                <small class="text-danger error-message error-confirm-password " ></small>
                <div class="text-center mt-3">
                    <div class="form-group">
                        <button class="btn bg-primary text-white fw-bold w-75" >Sign Up</button>
                    </div>
                    <a href="index.php">Already have account? <span class="text-danger" >Sign in</span> </a>
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