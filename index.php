<?php
$title="Accueil"; 
$description="Accueil";
$date="22/02/2022";
$style="";

                if(isset($_GET['style']) ){


                    if ( $_GET['style']=='classic'  ){


                        
                        setcookie("style","classic");
                    }

                    if ( $_GET['style']=='alternative'  ){
                        
                        setcookie("style","alternative");
                    }
                    
                }
                   
                
                if (isset( $_COOKIE['style'])) {

                        if ($_COOKIE['style']=="classic" ){

                            $mode="style.css";
                        }

                        if ($_COOKIE['style']=="alternative" ){

                            $mode="alternative.css";
                        }
                }
                    




                if(!(isset($_GET['style'])) &&  !(isset($_COOKIE['style']) )){

                    $mode="style.css";
                    setcookie("style","classic");



                }

                  
               
require"./include/header.inc.php";
?>
<main class="main">
        <?php
                if(isset($_GET['style']) && isset($_GET['lang'])){
                    if ( $_GET['style']=='alternative' && $_GET['lang']=='en'){
                        echo '<p><a href="index.php?lang=en&style=classic">Mode jour</a></p>';
                        echo '<p><a href="index.php?style=alternative&lang=fr"><img id="fr" src="./images/fr.png" alt="fr" width="90" height="30"/></a></p>';                      
                        require"./include/english.inc.php";
                        
                    }
                    elseif( $_GET['style']=='alternative' && $_GET['lang']=='fr'){
                        echo '<p><a href="index.php?lang=fr&style=classic">Mode jour</a></p>';
                        echo '<p><a href="index.php?style=alternative&lang=en"><img id="en" src="./images/en.jpg" alt="en" width="90" height="30"/></a></p>';                
                        require"./include/french.inc.php";
                        
                    }
                    else{
                        if ( $_GET['lang']=='en'){
                            echo '<p><a href="index.php?lang=fr&style=alternative">Mode nuit</a></p>';
                            echo '<p><a href="index.php?lang=fr"><img id="fr" src="./images/fr.png" alt="fr" width="90" height="30"/></a></p>';                      
                            require"./include/english.inc.php";
                            
                        }
                        else{
                            echo '<p><a href="index.php?lang=fr&style=alternative">Mode nuit</a></p>';
                            echo '<p><a href="index.php?lang=en"><img id="en" src="./images/en.jpg" alt="en" width="90" height="30"/></a></p>';                
                            require"./include/french.inc.php";
                        }

                    }   

                }
                elseif(isset($_GET['style'])){
                    if ( $_GET['style']=='alternative'){
                        echo '<p><a href="index.php">Mode jour</a></p>';
                        echo '<p><a href="index.php?style=classic&lang=en"><img id="en" src="./images/en.jpg" alt="en" width="90" height="30"/></a></p>';                
                        require"./include/french.inc.php";
                        
                    }
                    else{
                        echo '<p><a href="index.php?style=alternative">Mode nuit</a></p>';
                        echo '<p><a href="index.php?lang=en"><img id="en" src="./images/en.jpg" alt="en" width="90" height="30"/></a></p>';                
                        require"./include/french.inc.php";
                    }
                }
                elseif(isset($_GET['lang'])){
                    if ( $_GET['lang']=='en'){
                        echo '<p><a href="index.php?lang=en&style=alternative">Mode nuit</a></p>';
                        echo '<p><a href="index.php?lang=fr"><img id="fr" src="./images/fr.png" alt="fr" width="90" height="30"/></a></p>';  
                        require"./include/english.inc.php";
                        
                    }
                    else{
                        echo '<p><a href="index.php?lang=fr&style=alternative">Mode nuit</a></p>';
                        echo '<p><a href="index.php?lang=en"><img id="en" src="./images/en.jpg" alt="en" width="90" height="30"/></a></p>';                
                        require"./include/french.inc.php";
                    }
                }
                else{
                    echo '<p><a href="index.php?style=alternative">Mode nuit</a></p>';
                    echo '<p><a href="index.php?lang=en"><img id="en" src="./images/en.jpg" alt="en" width="90" height="30"/></a></p>';
                    require"./include/french.inc.php";
                    
                }
                
               
            ?>

</main>
<?php
$date="22/02/2022";
require"./include/footer.inc.php";
?>