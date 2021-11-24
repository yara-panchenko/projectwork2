<?php
$func=simplexml_load_file("andme.xml");
require_once ("conf.php");
if(!empty($_REQUEST["uusnimi"])) {
    if(($_REQUEST["uusnimi"])) {
        $kask = $yhendus->prepare("INSERT INTO haal(nimi, lisamisaeg)
        VALUES (?, NOW())");
        $kask->bind_param("s", $_REQUEST["uusnimi"]);
        $kask->execute();
    }
    else{
    }
    $kask = $yhendus->prepare("INSERT INTO haal(nimi, lisamisaeg)values (?, NOW())");
    $kask->bind_param("s", $_REQUEST["uusnimi"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Häälemine</title>
</head>
<body>
<form action="logout.php" method="post">
    <input type="submit" value="Logi välja" name="logout">
</form>
<table class="table table-bordered">
    <h1>Haldus leht!</h1>
    <form action="?">
        <input type="text" placeholder="Добавить проект" name="uusnimi" autocomplete="off">
        <input type="submit" value="Ok">
    </form>
<?php
foreach ($func->project as $arua) {
    echo "<tr>";
    echo "<td>".($arua->kasutaja->nimi)."</td>";
    echo "<td>".($arua->kasutaja->roll)."</td>";
    echo "<td>".($arua->siselogimiseaeg)."</td>";
    echo "<td>".($arua->kinnitusstaatus)."</td>";
    echo "</tr>";
}
?>