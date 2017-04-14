<?php
//lecture d'un fichier caractère par caractère
//$fic=fopen('D:\Downloads\en.openfoodfacts.org.products.csv', "r");
$fic=fopen('http://world.openfoodfacts.org/data/en.openfoodfacts.org.products.csv', "r");
$i=0;
while($i<100) {
    $i++;
    $caractere=fgetc($fic);
    if(!feof($fic)) {
        echo $caractere . "<br />";
    }
}
fclose($fic) ;


/*while(!feof($fic)) {
    $caractere=fgetc($fic);
    if(!feof($fic)) {
    echo $caractere . "<br />";
    }
}
    fclose($fic) ;
*/
 ?>
