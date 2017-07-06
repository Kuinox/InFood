<?php
include("r.php");
include ("y.php");
$banana = explode("\n",$read);
$array = explode("<li>",$text);
$list = [];
$test = [];
$point = [];
$banlist = array("</li>","</ul>","<ul>","EMUL","AC","AOX","BL","CTG","BC","<u>", "</u>","<em>","</em>");

foreach ($array as $key => $value) {
    if (strlen($value) < 3) {
        unset($array[$key]);
    }
    $test[$key] = explode("</strong>",$value);
    $test[$key] = str_replace("<strong>", "" ,$test[$key]);
    $test[$key] = str_replace("<em>", "" ,$test[$key]);
    $test[$key] = str_replace("</em>", "" ,$test[$key]);
    }
array_shift($test);
foreach ($test as $key => $value) {
    @$list[$test[$key][0]] = $test[$key][1];
    $point[$test[$key][0]] = "";
}
foreach ($list as $key => $value) {
    foreach ($banlist as $ban) {
        $list[$key] = str_replace($ban, "" ,$list[$key]);
    }
    $reg = preg_match("#REG|FS|PD#",$value);
    $ban = preg_match("#BAN|ILL|PS#",$value);
    $leg = preg_match("#GRAS#",$value);
    if ($reg == TRUE) {
        $point[$key] = 0;
    }else if ($ban == TRUE){
        $point[$key] = -1;
    }else if ($leg == TRUE) {
        $point[$key] = 1;
    }else {
        $point[$key] = 0;
    }
}
foreach ($banana as $key => $value) {
    $bana = explode(" ",$value);
    $nbBana = count($bana);
    $num =$bana[$nbBana-1];
    unset($bana[$nbBana-1]);
    $banas[] = implode(" ",$bana);
}
foreach ($banas as $key => $value) {
    foreach ($point as $ke => $vale) {
        if ($value === $ke) {
            echo "string"; // a finir rapidement 5/07/17
        }
    }
}
foreach ($point as $key => $value) {

}
?>
