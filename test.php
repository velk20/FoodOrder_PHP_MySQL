<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Задача с РНР Форма</title>
</head>
<body>
<?php
if (isset($_POST["name1"])) {
    echo "Списък на получените данни:<br>";
    for ($i=1; $i<=9; $i++) {
        echo "Стока $i име: ";
        echo $_POST["name$i"];
        echo ", тегло: ";
        echo $_POST["kg$i"]."<br>";
    }

    echo "<br>Максимално тегло: ";
    $max = 0;
    $nameOfMax = '';
    for ($i=1; $i<=9; $i++)
    {
        $currentKg =  $_POST["kg$i"];
        if ($currentKg >= $max) {
            $max= $currentKg;
            $nameOfMax = $_POST["name$i"];
        }
    }

    echo $max." на стока ".$nameOfMax." <br>";

    echo "<br>Стоки с тегло над 22.5: <br>";
    for ($i=1; $i<=9; $i++)
    {
        if ($_POST["kg$i"]>22.5){
            echo "Стока $i име: ";
            echo $_POST["name$i"];
            echo ", тегло: ";
            echo $_POST["kg$i"]."<br>";
        }
    }
    echo "<br>";

}
?>

<h2>Задача за 9 стоки с тегло</h2>
Въведете информацията за стоките:

<form method = "POST" action = "<?=$_SERVER['PHP_SELF'];?>">
    <?PHP
    for ($i=1; $i<=9; $i++) {
        ?>
        Стока <?=$i?> име
        <input type = "text" name = "name<?=$i?>" value = "<?PHP if(isset($_POST["name$i"])) echo $_POST["name$i"];?>">
        тегло
        <input type = "number" step="any" name = "kg<?=$i?>" value = "<?PHP if(isset($_POST["kg$i"])) echo $_POST["kg$i"];?>">
        <br>
        <?PHP
    }
    ?>
    <input type = "submit" name = "submit" value = "Изпрати">
</form>
</body>
</html>