<?php
function rechercheAliment($bdd, $recherche, $debut , $nb_affichage_par_page, $type) {
    $query = " SELECT SQL_CALC_FOUND_ROWS a.id_aliment , a.name_aliment,
                MATCH (g.label) AGAINST (:recherche IN NATURAL LANGUAGE MODE) AS relevance,
                MATCH (a.name_aliment) AGAINST (:recherche IN NATURAL LANGUAGE MODE) AS title_relevance
                FROM aliment a
                LEFT OUTER JOIN generic_name g
                ON g.id = a.generic_name_id
                WHERE   MATCH(a.name_aliment) AGAINST (:recherche IN NATURAL LANGUAGE MODE)
                        OR
                        MATCH(g.label) AGAINST (:recherche IN NATURAL LANGUAGE MODE)
                ORDER BY title_relevance*2+relevance DESC, a.name_aliment ASC
                LIMIT $debut , $nb_affichage_par_page";
    $result = $bdd->prepare($query);
    $result->execute(array(':recherche' => $recherche));
    $output = $result->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function rechercheClassic($bdd, $recherche, $debut , $nb_affichage_par_page, $type) {
    $query = "  SELECT SQL_CALC_FOUND_ROWS num, id, name, products, url,
                    MATCH(`id`) AGAINST (? IN NATURAL LANGUAGE MODE) AS title_relevance,
                    MATCH(`name`) AGAINST (? IN NATURAL LANGUAGE MODE) AS relevance
                FROM $type
                WHERE   MATCH(`id`) AGAINST (? IN NATURAL LANGUAGE MODE)
                        OR
                        MATCH(`name`) AGAINST (? IN NATURAL LANGUAGE MODE)
                ORDER BY title_relevance*2+relevance DESC, name ASC
                LIMIT $debut , $nb_affichage_par_page";
    $result = $bdd->prepare($query);
    $result->execute(array($recherche,$recherche,$recherche,$recherche));
    return $result;
}

function rechercheAlternate($bdd, $recherche, $debut , $nb_affichage_par_page, $type) {
    $query = "  SELECT SQL_CALC_FOUND_ROWS id, label,
                    MATCH(`label`) AGAINST (? IN NATURAL LANGUAGE MODE) AS relevance
              FROM $type
              WHERE MATCH(`label`) AGAINST (? IN NATURAL LANGUAGE MODE)
              ORDER BY relevance DESC
              LIMIT $debut , $nb_affichage_par_page";
    $result = $bdd->prepare($query);
    $result->execute(array($recherche, $recherche));
    return $result;
}

?>
