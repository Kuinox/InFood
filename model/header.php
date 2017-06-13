        <?php $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/"; ?>
        <header>
            <div class="top_header">
                <div class="top_header_container">
                    <form id="search" action="<?php echo $path; ?>resultat_de_recherche" method="GET">
                        <a class="accueil" href="<?php echo $path ?>">In'Food</a>
                        <select name = "type" id="type">
                            <option value="aliment" selected>Produits</option>
                            <option value="additive">Additifs</option>
                            <option value="ingredient">Ingredients</option>
                            <option value="categorie">Categories</option>
                            <option value="allergen">Allergènes</option>
                            <option value="manufacturing_place">Lieu de fabrication</option>
                            <option value="brand">Marques</option>
                            <option value="packaging">Packaging</option>
                            <option value="generic_name">Nom générique</option>
                        </select>
                        <input class="recherch" type="text" name="recherche" placeholder="Rechercher sur In'Food"/>
                        <input class="icon" type="image" src="<?php echo $path; ?>ressources/logo.svg"/>
                        <!--<a href="todo"><img src="TODO"/></a> <!--TODO: IMAGE-->
                    </form>
                    <?php
                    include(__DIR__."/../controller/SQL/functions/connect.php");
                    include(__DIR__."/../controller/functions/deconnexion.php");
                    include(__DIR__."/profilBar.php");
                    include(__DIR__."/connexionInscription.php");
                    include(__DIR__."/../controller/functions/preference.php");
                    ?>
                </div>
            </div>
            <!--<div class="bot_header">

            </div>-->
        </header>
