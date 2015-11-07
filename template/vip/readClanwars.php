<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>text z clanwars</title>
</head>
<body>
<?php
include('simple_html_dom.php');
include('./config/config.php');

$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
//ziskanie najstarsieho datumu z DB
try {
    $conn = new PDO("mysql:host=$db_ip;port=$db_port;dbname=ezpz-vip", $db_login, $db_pass, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT datum FROM `vip` ORDER BY datum DESC LIMIT 1";
    $result = $conn->prepare($sql);
    $result->execute();
    $datum_posledny = $result->fetchAll()[0]['datum'];
} catch (PDOException $e) {
    $result = null;
    $conn = null;
    echo "<div class=\"alert alert-danger\">Chyba</div>";
    exit;
}

//z neaktivnenie starsich ako mesiac
$pred_mesiacom = date('Y-m-d H:i:s', strtotime("+1 month"));
//var_dump($pred_mesiacom);
try {
    $sql = "UPDATE vip SET active=0 WHERE datum<='$pred_mesiacom';";
//    var_dump($sql);
    $result = $conn->prepare($sql);
    $result->execute();
} catch (PDOException $e) {
    $result = null;
    $conn = null;
    echo "<div class=\"alert alert-danger\">Chyba</div>";
    exit;
}

//nacitanie stranky clanwars
$file = file_get_contents($link_VIP);
$html = new simple_html_dom();
$html->load($file);
//var_dump($html);
$trs = $html->find('tr');
//var_dump($trs);
$i = 0;
$values = "";

//prejdene riadov tr
foreach ($trs as $tr) {
    if ($i !== 0) {
        $chars1 = preg_split('[<tr[^>]*>(.*?)</tr>]', $tr, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
//        var_dump($chars1[0]);
        $chars = preg_split('[<td[^>]*>(.*?)</td>]', $chars1[0], -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
//        var_dump($chars);

        $id = $chars[1];
        $datum = $chars[3];
        $suma = $chars[5];
        $cista_suma = $chars[8];
        $text = $chars[10];
        $steamid = explode("5461 ", $text)[1];

        $datum = new DateTime($datum);
        $datum = $datum->format('Y-m-d H:i:s');
//        var_dump($datum_posledny , $datum, $datum_posledny < $datum);
        if ($datum_posledny < $datum) {
            if ($i > 1) {
                $values .= ",";
            }
//        $values .= "(8438, '$datum', '$suma', '$cista_suma', '$text', '$steamid', 1)";
            $values .= "($id, '$datum', '$suma', '$cista_suma', '$text', '$steamid', 1)";

            echo $id . ' | ';
            echo $datum . ' | ';
            echo $suma . ' | ';
            echo $cista_suma . ' | ';
            echo $text . ' | ';
            echo $steamid;
//        echo '<br/>';
        }
    }
    $i++;
}

//ak nejake zaznamy su, tak ich vlozime do DB
if ($values !== "") {
    try {
        $sql = "INSERT INTO vip (id, datum, suma, kredit, text, steam_id, active) VALUES " . $values;
//        var_dump($sql);
        $result = $conn->prepare($sql);
        $result->execute();
    } catch (PDOException $e) {
        $result = null;
        $conn = null;
        echo "<div class=\"alert alert-danger\">Chyba</div>";
        exit;
    }
    $conn = null;
} else {
    var_dump('Ziadny zaznam nevyhovuje');
}
?>
</body>
</html>

