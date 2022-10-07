<?php
    function dateDuJour(){
        $d= explode(",",$_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $n="";
        if($d=='en'){
            $n.= date("l").", ".date("F")." ".date("d").", ".date("Y");
        }
        else{
            setlocale(LC_TIME, ['fr_FR.utf8','fr', 'fra', 'fr_FR']);
            $n.=strftime('%A %d %B %Y %I:%M:%S');
        }

        return $n;
    }
  
    function get_navigateur() {
        $n= explode("/",$_SERVER['HTTP_USER_AGENT']);
        return $n[0];
    }

?>   