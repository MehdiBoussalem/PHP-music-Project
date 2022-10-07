<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?php echo $title;?></title>
        <meta charset="utf-8"/>
        <meta name="author" content="Elyes"/>
        <meta name="description" content=<?php echo  "\"$description\""; ?>/>
        <meta name="date" content=<?php echo  "\"$date\""; ?>/>
        <meta name="subject" content="php"/>
        <link rel="stylesheet" type="text/css" href=<?php echo  "\"$mode\""; ?>/>
        <style><?php echo  "\"$style\""; ?> </style>
    </head>
    <body>
        <header id="haut_de_page" class="header">
            <h1 class="header-title"><?php echo $title;?></h1>
            
            <nav class="header-nav">
                <ul>
                    <li><a href="index.php" title="Acceuil">Acceuil</a></li>
                    <li><a href="nasa.php" title="td5">API Nasa</a></li>
                    <li><a href="info.php" title="td6">Informations Utilisateur</a></li>
                    <li><a href="music.php" title="Musique">Musique</a></li>
                    <li><a href="statistiques.php" title="Statistiques">Statistiques</a></li>
                   
                </ul>
            </nav>
        </header>