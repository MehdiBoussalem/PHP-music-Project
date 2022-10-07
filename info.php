<?php
$title="Accueil"; 
$description="Accueil";
$date="22/02/2022";
$style="";

                if(isset($_GET['style'])){
                    if ( $_GET['style']=='alternative'){
                        $mode="alternative.css";
                    }
                    else{
                        
                        $mode="style.css";
                    }
                }
                else{
                    
                    $mode="style.css";
                }
               
require"./include/header.inc.php";
?>
<main class="main">
       
       <h1> Infos utilisateurs </h1>

      <?php
            $ip= $_SERVER['REMOTE_ADDR'];
            $url= "http://www.geoplugin.net/xml.gp?ip=".$ip;
            $xml=file_get_contents($url);
            $obj=simplexml_load_string($xml);
            $text= "<p>".$obj->geoplugin_city." ";
            $text.=$obj->geoplugin_region." ";
            $text.=$obj->geoplugin_countryName." ";
            $text.=$obj->geoplugin_countryCode." Votre ip: ";
            $text.=$obj->geoplugin_request." "."</p>";
            echo $text;
            ?>

</main>
<?php
$date="22/02/2022";
require"./include/footer.inc.php";
?>