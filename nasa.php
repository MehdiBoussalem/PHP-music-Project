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
       
       <h1> Photo du jour</h1>
       <?php
         $url="https://api.nasa.gov/planetary/apod?api_key=8zcIlYdxCUNFSHqOZvrNyUuf012mJiITtFujWQoo";
            $json=file_get_contents($url);
            $obj=json_decode($json);
            echo "<h2>".$obj->title."</h2>";
            echo "<img src='".$obj->url."' alt='".$obj->title."'/>";
            echo "<p>".$obj->explanation."</p>";
            echo "<p>".$obj->date."</p>";
            echo "<p>".$obj->copyright."</p>";

       ?>
       

</main>
<?php
$date="22/02/2022";
require"./include/footer.inc.php";
?>