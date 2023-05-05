<?php

class log{
    
    public static function logs($message){
        $path = "../../log.log";
        $date = date('Y-m-d h:i:s A');

        $log = "$date} - {$message}\n";

        file_put_contents($path , $log, FILE_APPEND);
    }
}

?>