<?php
require_once("../database/connection.php");
 
$sql = "SELECT * FROM `announcements` ORDER BY AnnouncementID DESC ";
$result = DB::DBconnection()->query($sql);

$output = array();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){

        $date = date('D ,F d Y', strtotime($row['AnnouncementDate']));
        $announcement = array(
            'title'=>$row['AnnouncementTitle'],
            'message'=>$row['AnnouncementContent'],
            'date'=>$date
        );

        $output[] = $announcement;

    }
    
}
DB::DBclose();
echo json_encode($output);


?>