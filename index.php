<?php
$func=simplexml_load_file("andme.xml");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Andmed</title>
</head>
<body>
<h1>Projekti aja jalgmise rakendus</h1>
<div class="position-absolute">
<form action="logout.php" method="post">
    <input type="submit" value="Logi välja" name="logout" class="loginout">
</form>
</div>

<table class="table table-bordered table-dark">
    <tr>
        <th>Nimi</th>
        <th>Roll</th>
        <th>Aeg</th>
        <th>Kinnitusstaatus</th>
    </tr>
    <?php
    foreach ($func->project as $arua){
        echo "<tr>";
        echo "<td>". ($arua->kasutaja->nimi) . "</td>";
        echo "<td>". ($arua->kasutaja->roll) . "</td>";
        echo "<td>". ($arua->siselogimiseaeg) . "</td>";
        echo "<td>". ($arua->kinnitusstaatus) . "</td>";
        echo "</tr>";
    }
    ?>
</table>
<form action="?" method="post">
    Otsing: <input type="text" name="search" placeholder="rolli otsing"/>
    <input type="submit" value="Otsi"/>
</form>
<?php
function searchByRoll($query){
global $func;
$result = array ();
foreach ($func->project as $arua){
if(strtolower($arua->kasutaja->roll)==strtolower($query))
array_push($result,$arua);
}
return $result;
}
?>
<ul>
    <?php
    if(!empty($_POST["search"])){
        $result=searchByRoll($_POST["search"]);
        foreach($result as $arua){
            echo "<li>".($arua->kasutaja->nimi).", ".($arua->kasutaja->roll);
            echo "</li>";
        }
    }
    ?>
</ul>
</body>
</html>
