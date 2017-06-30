<?php
include_once(__DIR__."/../controller/SQL/FUNCTIONS/connectNoUse.php");
if(!$db_exist) {
    include(__DIR__."/../admin/create_bdd.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

    <?php
    include(__DIR__."/head.php"); ?>
    <body> <?php include(__DIR__."/header.php");?>
        <div class="full_page_container">
            <?php
            if (explode("/", $_SERVER['REQUEST_URI'])[2] != "compare.php" && isset($_SESSION['compare'])) { ?>
            <div class="compare">
                <?php
                if (empty($_SESSION['compare'])) {

                }else {
                    foreach ($_SESSION['compare'] as $key => $value) {
                    $query = "SELECT name_aliment FROM aliment WHERE id_aliment LIKE ?";
                    $prep = $bdd->prepare($query);
                    $prep->execute(array($value));
                    $result = $prep->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $key => $value) {
                        $valu = implode($value);
                        echo "<div>".$valu."</div>";
                    }
                }
                $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";
                ?>
                <br>

                <a href= '<?php echo $path; ?>compare.php' ><button>comparer</button></a>
                <?php } ?>
            </div>
            <?php } ?>
