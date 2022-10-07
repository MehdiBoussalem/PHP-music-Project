<?php
        define("API_KEY","91c68479209f8167e6815dee7d53ea67");
        define("API_KEY_NASA","8zcIlYdxCUNFSHqOZvrNyUuf012mJiITtFujWQoo");
            function lastfm_get_track_by_name($name){
                $url="http://ws.audioscrobbler.com/2.0/?method=track.search&track=".$name."&api_key=".API_KEY."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);
                for ($i=0;$i<count($obj->results->trackmatches->track);$i++){
                    if ($i==10){
                        break;
                    }
                    $name=$obj->results->trackmatches->track[$i]->name;
                    $name = str_replace(" ","%20",$name);
                    $artist=$obj->results->trackmatches->track[$i]->artist;
                    $artist = str_replace(" ","%20",$artist);
                    echo "<p>"."<a href=music.php?name=".$name."&artist=".$artist."&tag=track>".$obj->results->trackmatches->track[$i]->name.", De ".$obj->results->trackmatches->track[$i]->artist."</a>"."</p>";
                }
            }

            function lastfm_affiche_info_musique($name,$artist){
                

                $name = urldecode($name);
                $artist = urldecode($artist);                
                $url="http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=".API_KEY."&artist=".$artist."&track=".$name."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);


                $track=$obj->track;
                $artist=$track->artist->name;
                $name=$track->name;
                $album=$track->album->title;
                $image=$track->album->image[3]->{'#text'};
                $listeners=$track->listeners;
                $url=$track->url;
                $description=$track->wiki->summary;
                
                $content=
                        "<h2>" . $artist . "</h2>"
                        . "<h3>" . $name . "</h3>"
                        ."<h4>Album: " . $album . "</h4>"
                        . "<img src='" . $image . "' alt='" . $name . "'>"
                        . "<p>" . $description . "</p>"
                        . "<p>Nombre de lecteurs : " . $listeners . "</p>"
                        . "<p><a href='" . $url . "'>Lien vers la page de la musique</a></p>";
                return $content;
            


     
            }




            function lastfm_get_artist_by_name($artist){
                $url="http://ws.audioscrobbler.com/2.0/?method=artist.search&artist=".$artist."&api_key=".API_KEY."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);
                //$artist_info=$obj->results->artistmatches->artist[0];
                for ($i=0;$i<count($obj->results->artistmatches->artist);$i++){
                    if ($i==10){
                        break;
                    }
                    $artist_name=$obj->results->artistmatches->artist[$i]->name;
                    $artist_name = str_replace(" ","%20",$artist_name);
                    echo "<p>"."<a href=music.php?artist=".$artist_name."&tag=artist>".$obj->results->artistmatches->artist[$i]->name."</a>"."</p>";
                }
            }

            function lastfm_affiche_info_artist($artist_name){
                $url="http://ws.audioscrobbler.com/2.0/?method=artist.getInfo&api_key=".API_KEY."&artist=".$artist_name."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);
                $artist=$obj->artist;
                $name=$artist->name;
                $playcount=$artist->stats->playcount;
                $description=$artist->bio->summary;
                $url="http://ws.audioscrobbler.com/2.0/?method=artist.getTopTags&api_key=".API_KEY."&artist=".$artist_name."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);
                $tag1=$obj->toptags->tag[0]->name;
                $tag2=$obj->toptags->tag[1]->name;
                $url="http://ws.audioscrobbler.com/2.0/?method=artist.getTopAlbums&api_key=".API_KEY."&artist=".$artist_name."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);
                $albums=$obj->topalbums->album;
                $album1=$obj->topalbums->album[0]->name;
                $image_album1=$obj->topalbums->album[0]->image[2]->{'#text'};
                $url="http://ws.audioscrobbler.com/2.0/?method=artist.getTopTracks&api_key=".API_KEY."&artist=".$artist_name."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);
                $track1=$obj->toptracks->track[0]->name;
                $track2=$obj->toptracks->track[1]->name;
                $track3=$obj->toptracks->track[2]->name;



                $content =
                        "<h2>" . $name . "</h2>"
                        . "<p>" . $description . "</p>"
                        ."<p>Les tops genres de ".$name." : ".$tag1." et ".$tag2. "</p>"
                        . "<p>Le top album de ".$name." : ".$album1."</p>"
                        . "<img src='" . $image_album1 . "' alt='" . $name . "'>"
                        . "<p>Les tops musiques de ".$name." : ".$track1.", ".$track2." et ".$track3."</p>"
                        . "<p>Nombre de lectures : " . $playcount . "</p>";
                    $content.= "Liste des albums : ";
                    $content .= "<ul>";
                    for ($i=0;$i<count($albums);$i++){
                        $content .= "<li>".$albums[$i]->name."</li>";


                    }
                    $content .= "</ul>";
                    

               
                return $content;
            }
            function lastfm_get_album_by_name($album){
                $url="http://ws.audioscrobbler.com/2.0/?method=album.search&album=".$album."&api_key=".API_KEY."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);
                for ($i=0;$i<count($obj->results->albummatches->album);$i++){
                    if ($i==10){
                        break;
                    }
                    $album_name=$obj->results->albummatches->album[$i]->name;
                    $album_name = str_replace(" ","%20",$album_name);
                    $artiste_name=$obj->results->albummatches->album[$i]->artist;
                    $artiste_name = str_replace(" ","%20",$artiste_name);
                    echo "<p>"."<a href=music.php?artist=".$artiste_name."&album=".$album_name."&tag=album>".$obj->results->albummatches->album[$i]->name.", De ".$obj->results->albummatches->album[$i]->artist."</a>"."</p>";
                }
            }
            function lastfm_affiche_info_album($album_name,$artiste_name){
                $url="http://ws.audioscrobbler.com/2.0/?method=album.getInfo&api_key=".API_KEY."&artist=".$artiste_name."&album=".$album_name."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);

                $album=$obj->album;
                $name=$album->name;
                $playcount=$album->stats->playcount;
                $image_album=$album->image[2]->{'#text'};
                $tracks=$album->tracks->track;
                $content =
                        "<h2>" . $artiste_name . "</h2>"
                        ."<h3>" . $name . "</h3>"
                        . "<img src='" . $image_album . "' alt='" . $name . "'>"
                        . "<p>Nombre de lectures : " . $playcount . "</p>"
                        ."<p>Les tracks de l'album : ";
                    $content .= "<ul>";
                    for ($i=0;$i<count($tracks);$i++){
                        $content .= "<li>".$tracks[$i]->name."</li>";
                    }

            
                        
                return $content;




            }
            function lastfm_affiche_info_tag($tag){
                $url="http://ws.audioscrobbler.com/2.0/?method=tag.getInfo&tag=".$tag."&api_key=".API_KEY."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);

                $name=$obj->tag->name;
                $total=$obj->tag->total;

                $url="http://ws.audioscrobbler.com/2.0/?method=tag.getTopArtists&tag=".$tag."&api_key=".API_KEY."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);
                $top_artists=$obj->topartists->artist;

                $url="http://ws.audioscrobbler.com/2.0/?method=tag.getTopAlbums&tag=".$tag."&api_key=".API_KEY."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);
                $top_albums=$obj->albums->album;

                $url="http://ws.audioscrobbler.com/2.0/?method=tag.getTopTracks&tag=".$tag."&api_key=".API_KEY."&format=json";
                $url=str_replace(" ","%20",$url);
                $json=file_get_contents($url);
                $obj=json_decode($json);
                $top_tracks=$obj->tracks->track;

                $content =
                        "<h2>" . $name . "</h2>"
                        . "<p>Nombre de lectures : " . $total . "</p>"
                        ."<p>Les tops artistes du genre  '".$name."' : ";
                    $content .= "<ul>";
                    for ($i=0;$i<count($top_artists);$i++){
                        if ($i==10){
                            break;
                        }
                        $content .= "<li>".$top_artists[$i]->name."</li>";
                    }
                    $content .= "</ul>";
                    $content .= "<p>Les tops albums du genre  '".$name."' : ";
                    $content .= "<ul>";
                    for ($i=0;$i<count($top_albums);$i++){
                        if ($i==10){
                            break;
                        }
                        $content .= "<li>".$top_albums[$i]->name.", De ".$top_albums[$i]->artist->name."</li>";
                    }
                    $content .= "</ul>";
                    $content .= "<p>Les tops tracks du genre  '".$name."' : ";
                    $content .= "<ul>";
                    for ($i=0;$i<count($top_tracks);$i++){
                        if ($i==10){
                            break;
                        }
                        $content .= "<li>".$top_tracks[$i]->name.", De ".$top_tracks[$i]->artist->name."</li>";
                    }
                    $content .= "</ul>";
                    return $content;





            }
            function ecrire_stat($name,$artist){
                $est_dans_stats=false;
                $csvFile = file('stats.csv');
                $data = [];
                $name=str_replace('"','',$name);
                $artist=str_replace('"','',$artist);
                foreach ($csvFile as $line) {
                    $data[] = str_getcsv($line,";");
                }
                for ($i=0;$i<count($data);$i++){
                    if ($data[$i][0]==$name && $data[$i][1]==$artist){
                        $data[$i][2]++;
                        $est_dans_stats=true;
                        break;
                    }
                }
                if ($est_dans_stats==false){
                    $data[]=[$name,$artist,1];
                }
                $fp = fopen('stats.csv', 'w');
                foreach ($data as $line) {
                    fputcsv($fp, $line, ';');
                }
                fclose($fp);




            }
            function trier_csv($csvFile){
                $csvFile=file($csvFile);
                $data = [];
                $data_sorted = [];
                foreach ($csvFile as $line) {
                    $data[] = str_getcsv($line,";");
                }
                $compteur=0;
              while($compteur<count($data)){
                    $max=0;
                    $max_index=0;
                    for ($i=0;$i<count($data);$i++){
                        if ($data[$i][2]>$max){
                            $max=$data[$i][2];
                            $max_index=$i;
                        }
                    }
                    $data_sorted[]=$data[$max_index];
                    unset($data[$max_index]);
                    $compteur++;
                }
            
                return $data_sorted;

                }
                
        









?>
