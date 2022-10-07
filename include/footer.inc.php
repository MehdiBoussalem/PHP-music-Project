<footer class="footer">
            <p>Elyes Zouaoui - Mehdi Boussalem</p>
            <?php
                include('./include/util.inc.php');
                echo "<p>".dateDuJour()."</p>";
                echo "<p>".get_navigateur()."</p>";
            ?>
            
            <ul>
                <li><img id="logo_cyu" src="./images/cyu.png" alt="cyu logo" width="150" height="50"/></li>
                <li><a href="#haut_de_page">Revenir en haut de page</a></li>
                <li><a href="index.php">Revenir à l'accueil</a></li>
                <li><a href="plan.php" title="plan du site">Plan</a></li>    
            </ul>           
        </footer>
    </body>

</html>
