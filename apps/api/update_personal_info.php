<?php
    print_r($_POST);
    print_r($_FILES);
    
    function updatePersonal(){

        $profile = $_FILES['profile']['name'];
        $profile = $_FILES['profile']['name_tmp'];
        $profileSize = $_FILES['profile']['size'];

        $fullname = mysqli_real_escape_string(DB::DBconnection(), $_POST['fullname']);

        $validEx = array("png", "jpg");

        
        

    }

    echo updatePersonal();

?>