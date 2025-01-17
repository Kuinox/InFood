        <?php
        $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";
        if(isset($_GET['recherche'])) {
            $recherche_input = ($_GET['recherche']);
        } else {
            $recherche_input = "";
        }
        $array_select = [];
        if(isset($_GET['type'])) {
            foreach(array("aliment", "additives", "ingredients", "categories","allergens", "manufacturing_place", "brands", "packaging", "generic_name", "labels", "traces")
            as $option) {
                if($_GET['type'] === $option) {
                    $array_select[$option] = "selected";
                } else {
                    $array_select[$option] = "";
                }
            }
        } else {
            foreach(array("aliment", "additives", "ingredients", "categories","allergens", "manufacturing_place", "brands", "packaging", "generic_name", "labels", "traces")
                    as $option) {
                $array_select[$option] = "";
            }
        }

        ?>
        <header>
            <div class="top_header">
                <div class="top_header_container">
                    <a class="accueil" href="<?php echo $path ?>">In'Food</a>
                    <form id="search" action="<?php echo $path; ?>resultat_de_recherche" method="GET">
                        <select name = "type" id="type">
                            <option value="aliment"             <?php echo array_shift($array_select); ?>>Aliments</option>
                            <option value="additives"           <?php echo array_shift($array_select); ?>>Additifs</option>
                            <option value="ingredients"         <?php echo array_shift($array_select); ?>>Ingrédients</option>-->
                            <option value="categories"          <?php echo array_shift($array_select); ?>>Catégories</option>-->
                            <option value="allergens"           <?php echo array_shift($array_select); ?>>Allergènes</option>
                            <option value="manufacturing_place" <?php echo array_shift($array_select); ?>>Lieu de fabrication</option>
                            <option value="brands"              <?php echo array_shift($array_select); ?>>Marques</option>
                            <option value="packaging"           <?php echo array_shift($array_select); ?>>Packaging</option>
                            <option value="generic_name"        <?php echo array_shift($array_select); ?>>Nom générique</option>
                            <option value="labels"              <?php echo array_shift($array_select); ?>>Labels</option>
                            <option value="traces"              <?php echo array_shift($array_select); ?>>Traces</option>
                        </select>
                        <input class="recherche" type="text" name="recherche" value="<?php echo $recherche_input; ?>" placeholder="Rechercher sur In'Food"/>
                        <input class="icon" type="image" src="<?php echo $path; ?>ressources/logo.svg"/>
                        <!--<a href="todo"><img src="TODO"/></a> TODO: IMAGE-->
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
