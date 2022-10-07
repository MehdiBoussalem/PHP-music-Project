<?php
$title="Accueil"; 
$description="Accueil";
$date="22/02/2022";
$style="";
include("include/functions.inc.php");

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
<body>
        <form action="music.php" method="get">
                    <input type="text" name="recherche" placeholder="Rechercher " value="">
                    <select name="tag">
                        <option value="artist">Artiste</option>
                        <option value="album">Album</option>
                        <option value="track">Musique</option>
                        <option value="genre">Genre</option>
                    </select>
                    <input type ="submit" >
                </form> 

       <?php
            $resulat_recherche= $_GET['recherche'];
            if (isset($resulat_recherche) && isset($_GET['tag'])){
                if ($_GET["tag"]=="track"){
                echo lastfm_get_track_by_name($resulat_recherche);
                }
                if ($_GET["tag"]=="artist"){
                echo lastfm_get_artist_by_name($resulat_recherche);
                }
                if ($_GET["tag"]=="album"){
                    echo lastfm_get_album_by_name($resulat_recherche);

                }
                if ($_GET["tag"]=="genre"){
                    echo lastfm_affiche_info_tag($resulat_recherche);

                }
                if($resulat_recherche==""){
                    echo "Veuillez entrer une recherche";
                }
            }
            
                $tag=$_GET['tag'];            
                $name=$_GET['name'];
                $artist=$_GET['artist'];
                $album=$_GET['album'];
               
            
                
                //si name et artist sont définis, on affiche le résultat
            
                if (isset($name ) && isset($artist)&& isset($tag) && $tag=="track"){
                    $name = str_replace("%20"," ",$name);
                    $artist = str_replace("%20"," ",$artist);
                    $cookie_nom_musique = $name." - ".$artist;
                    $time=time();
                    //convert time to a h/m/s format
                    $time_formatted = date('H:i:s', $time);
                    $time_formatted = str_replace(":",".",$time_formatted);
                    $user_ip=$_SERVER['REMOTE_ADDR'];
                    setcookie("nom_musique", $cookie_nom_musique, "/");
                    setcookie("time", $time_formatted, "/");
                    setcookie("user_ip", $user_ip, "/");


                    ecrire_stat($name,$artist);
                    echo lastfm_affiche_info_musique($name,$artist);
                }
                if (isset($artist) && isset($tag) && $tag=="artist"){
                    $artist = str_replace("%20"," ",$artist);
                    echo lastfm_affiche_info_artist($artist);
                }
                if (isset($album)&&isset($artist) && isset($tag) && $tag=="album"){
                    $album = str_replace("%20"," ",$album);
                    $artist = str_replace("%20"," ",$artist);
                    echo lastfm_affiche_info_album($album,$artist);
                }


            
       ?>
</body>
</main>
<?php
$date="22/02/2022";
require"./include/footer.inc.php";
?>