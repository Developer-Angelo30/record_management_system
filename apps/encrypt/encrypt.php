<?php

class Hash{

    public static function Password($password){
        $firstEncrypt = md5("Facualty");
        $secondEncrypt = md5($firstEncrypt);
        $thirdEncrypt = md5($secondEncrypt);
    
        return md5($thirdEncrypt.$password);
    }

}

?>