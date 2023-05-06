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
    <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
</head>
<body>
    <section id="c1-template" class="container-fluid bg-white " >
    <div class="printable-holder">
        <div class="printable" id="printable" >
            <table width="100%" >
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th colspan="14" >I PERSONAL INFORMATION</th>
                </tr>
                <tr>
                    <td rowspan="3"  >
                        <h6>2 SURNAME</h6>
                        <h6>  FIRST NAME</h6>
                        <h6>  MIDDLE NAME</h6>
                    </td>
                    <td colspan="14"  ><input type="text" class="form-control" placeholder="Enter Surname" ></td>
                </tr>
                <tr>
                    <td colspan="10" ><input type="text" class="form-control" placeholder="Enter Firstname" ></td>
                    <td colspan="3" class="bg-secondary" ></td>
                </tr>
                <tr>
                    <td colspan="14"  ><input type="text" class="form-control" placeholder="Enter Middlename" ></td>
                </tr>
                <tr>
                    <td>
                        DATE OF BIRTH 
                        (mm/dd/yyyy)
                    </td>
                    <td colspan="2" ><input type="text" class="form-control" placeholder="mm-dd-yyyy" ></td>
                    <td rowspan="3" colspan="3" class="bg-secondary" >
                        <h6>16. CITIZENSHIP</h6>
                        <h6 class="text-center" ><small>If holder of  dual citizenship, </small></h6>
                        <h6 class="text-center" ><small>Iplease indicate the details.</small></h6>
                    </td>
                    <td rowspan="2" colspan="8" >
                        <span class="d-flex">
                            <span class="d-flex" >
                                <input type="checkbox" value="Filipino" name="" id="">
                                <label for="">Filipino</label> &nbsp; &nbsp; &nbsp;
                            </span>
                            <span class="d-flex" >
                                <input type="checkbox" value="Dual Citizenshipt" name="" id="">
                                <label for="">Dual Citizenshipt</label>&nbsp; &nbsp; &nbsp;
                            </span>
                            <span class="d-flex" >
                                <input type="checkbox" value="by birth" name="" id="">
                                <label for="">by birth</label>&nbsp; &nbsp; &nbsp;
                            </span>
                            <span class="d-flex" >
                                <input type="checkbox" value="by naturalization" name="" id="">
                                <label for="">by naturalization</label>&nbsp; &nbsp; &nbsp;
                            </span>
                        </span><br>
                        <p class="text-center">
                            Pls. indicate country:
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>4.PLACE OF BIRTH</td>
                    <td colspan="2" >
                    <input type="text" class="form-control" placeholder="Enter Place birth" >
                    </td>
                </tr>
                <tr>
                    <td>5. SEX</td>
                    <td colspan="2" > 
                       <span class="d-flex">
                        <span class="d-flex p-2">
                                <input type="radio" name="sex" class="form-radio" id="">
                                <label for=""> &nbsp; &nbsp;Male</label>
                        </span>
                        <span class="d-flex p-2">
                                <input type="radio" name="sex" class="form-radio" id="">
                                <label for=""> &nbsp; &nbsp;Female</label>
                        </span>
                       </span>
                    </td>
                    <td colspan="8" >
                        <select name="" class="w-100 form-select" id="">
                            <option value="">select country</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" >6. CIVIL STATUS</td>
                    <td colspan="2" rowspan="2"  > 
                       <span class="d-flex">
                        <span class="d-flex p-2">
                                <input type="radio" name="civil-status" class="form-radio" id="">
                                <label for=""> &nbsp; &nbsp;Single</label>
                        </span>
                        <span class="d-flex p-2">
                        &nbsp; &nbsp;&nbsp; &nbsp;
                                <input type="radio" name="civil-status" class="form-radio" id="">
                                <label for=""> &nbsp; &nbsp;Married</label>
                        </span>
                       </span>
                       <span class="d-flex">
                        <span class="d-flex p-2">
                                <input type="radio" name="civil-status" class="form-radio" id="">
                                <label for=""> &nbsp; &nbsp;Widowed</label>
                        </span>
                        <span class="d-flex p-2">
                                <input type="radio" name="civil-status" class="form-radio" id="">
                                <label for=""> &nbsp; &nbsp;Seperated</label>
                        </span>
                       </span>
                       <span class="d-flex">
                        <span class="d-flex p-2">
                                <input type="radio" name="civil-status" class="form-radio" id="">
                                <label for=""> &nbsp; &nbsp;Other/s</label>
                        </span>
                       </span>
                    </td>
                    <td colspan="2" rowspan="3" class="bg-secondary" >
                        <p>7. RESIDENTIAL ADDRESS</p>
                    </td>
                    <td colspan="9" >
                        <div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">House/Block/Lot No.</small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">Street</small>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">Subdivision/Village</small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">Barangay</small>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">City/Municipality</small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">Province</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    
                </tr>
                
                <tr>
                    <td>
                        7. HEIGHT (m)
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control">
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        8. WEIGHT (kg)
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control">
                    </td>
                    <td colspan="2" class="bg-secondary" >
                        <h6 class="text-center">ZIPCODE</h6>
                    </td>
                    <td colspan="9" >
                        <input type="text" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>9. BLOOD TYPE</td>
                    <td colspan="2" >
                        <input type="text" class="form-control">
                    </td>
                    <td rowspan="4" colspan="2" class="bg-secondary"></td>
                    <td rowspan="4" colspan="9" >
                    <div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">House/Block/Lot No.</small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">Street</small>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">Subdivision/Village</small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">Barangay</small>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">City/Municipality</small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <small class="text-center">Province</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>10. GSIS ID NO.</td>
                    <td colspan="2" >
                        <input type="text" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>11. PAG-IBIG ID NO.</td>
                    <td colspan="2" >
                        <input type="text" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>12. PHILHEALTH NO..</td>
                    <td colspan="2" >
                        <input type="text" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>13. SSS NO.</td>
                    <td colspan="2" >
                        <input type="text" class="form-control">
                    </td>
                    <td colspan="2" class="bg-secondary" >19. TELEPHONE NO.</td>
                    <td colspan="9" >
                        <input type="text" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>14. TIN NO.</td>
                    <td colspan="2" >
                        <input type="text" class="form-control">
                    </td>
                    <td colspan="2" class="bg-secondary" >20. MOBILE NO.</td>
                    <td colspan="9" >
                        <input type="text" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>15. AGENCY EMPLOYEE NO.</td>
                    <td colspan="2" >
                        <input type="text" class="form-control">
                    </td>
                    <td colspan="2" class="bg-secondary" >21. E-MAIL ADDRESS (if any)</td>
                    <td colspan="9" >
                        <input type="text" class="form-control">
                    </td>
                </tr>

                <!-- family backgroubnd -->
                <tr>
                    <th colspan="14" >II FAMILY BACKGROUND</th>
                </tr>
                <tr>
                    <td rowspan="3" >
                        <h6>22. SPOUSE'S SURNAME</h6>
                        <h6>FIRST NAME</h6>
                        <h6>MIDDLE NAME</h6>
                    </td>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="6" >23. NAME of CHILDREN  (Write full name and list all)</td>
                    <td colspan="3" >DATE OF BIRTH (mm/dd/yyyy) </td>
                </tr>
                <tr>
                    <td colspan="2" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="2" >
                        <small>NAME EXTENSION (JR., SR)    n/a</small>
                        <input type="text" class="form-control" placeholder="N/A" >
                    </td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>
                <tr>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>
                <tr>
                    <td>OCCUPATION</td>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>
                <tr>
                    <td>EMPLOYER/BUSINESS NAME</td>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>
                <tr>
                    <td>BUSINESS ADDRESS</td>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>
                <tr>
                    <td>TELEPHONE NO.</td>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>
                <tr>
                    <td rowspan="3" >
                        <h6>24. FATHER'S SURNAME</h6>
                        <h6>FIRST NAME</h6>
                        <h6>MIDDLE NAME</h6>
                    </td>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>
                <tr>
                    <td colspan="2" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="2" >
                        <small>NAME EXTENSION (JR., SR)    n/a</small>
                        <input type="text" class="form-control" placeholder="N/A" >
                    </td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>
                <tr>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>

                <tr>
                    <td rowspan="4" >
                        <h6>25. MOTHER'S MAIDEN NAME</h6>
                        <h6>SURNAME</h6>
                        <h6>FIRST NAME</h6>
                        <h6>MIDDLE NAME</h6>
                    </td>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>
                <tr>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>
                <tr>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="6" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="3" ><input type="text" class="form-control" placeholder="N/A" ></td>
                </tr>
                <tr>
                    <td colspan="4" ><input type="text" class="form-control" placeholder="N/A" ></td>
                    <td colspan="9" class="text-center" >
                        <strong class="text-danger text-center">(Continue on separate sheet if necessary)</strong>
                    </td>
                </tr>

                <!--  EDUCATIONA BACKGROUND -->
                <tr>
                    <th colspan="14" >III EDUCATIONAL BACKGROUND</th>
                </tr>
                <tr>
                    <td rowspan="2" colspan="2" >26. LEVEL</td>
                    <td rowspan="2" colspan="2" >NAME OF SCHOOL(Write in full)</td>
                    <td rowspan="2" colspan="2" >BASIC EDUCATION/DEGREE/COURSE(Write in full)</td>
                    <td colspan="2" >PERIOD OF ATTENDANCE</td>
                    <td rowspan="2" colspan="2" >HIGHEST LEVEL/UNITS EARNED<br>(if not graduated)</td>
                    <td rowspan="2" colspan="2" >YEAR GRADUATED</td>
                    <td rowspan="2" colspan="2" >SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</td>
                </tr>
                <tr>
                    <td>From</td>
                    <td>To</td>
                </tr>
                <tr>
                    <td colspan="2" >ELEMENTARY</td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="1" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="1" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >SECONDARY</td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="1" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="1" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" ></td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="1" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="1" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >COLLEGE</td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="1" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="1" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >GRADUATE STUDIES </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="1" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="1" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                    <td colspan="2" >
                        <input type="text" class="form-control" name="" id="">
                    </td>
                </tr>
                <tr>
                    <td colspan="14" class="text-center" >
                        <small class="text-danger">(Continue on separate sheet if necessary)</small>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >SIGNATURE</td>
                    <td colspan="4" >
                        
                    </td>
                    <td colspan="2" class="text-center" >
                        DATE
                    </td>
                    <td colspan="6" >
                        
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="text-end mt-2 mb-5">
        <button class="btn btn-success w-25" >Print</button>
    </div>
    </section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/a37dfd209c.js" crossorigin="anonymous"></script>
<script src="../../assets/js/customs.js"></script>
</body>
</html>