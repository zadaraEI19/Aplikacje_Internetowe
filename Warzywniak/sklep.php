<?php
$link = mysqli_connect("localhost","root","","dane2");
if(isset($_POST["nazwa"])) {
    $nazwa = $_POST["nazwa"];
}
if(isset($_POST["cena"])) {
    $cena = $_POST["cena"];
}
if(isset($_POST["nazwa"]) && isset($_POST["cena"])) {
    $query2 = mysqli_query($link,"insert into produkty (Rodzaje_id,Producenci_id,nazwa,ilosc,opis,cena,zdjecie) values((select id from rodzaje where nazwa = 'owoce'),(SELECT id from `producenci` where nazwa = 'warzywa-rolnik'),'$nazwa',10,'',$cena,'owoce.jpg')");
}
mysqli_close($link);
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl2.css">
    <title>Warzywniak</title>
</head>

<body>
    <div id="pierwszy" class="header">
        <h1>Internetowy sklep z eko-warzywami</h1>
    </div>
    <div id="drugi" class="header">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
        </ol>
    </div>
    <div class="main">
    <?php
    $link = mysqli_connect("localhost","root","","dane2");
    $query1 = mysqli_query($link,"select nazwa, ilosc, opis, cena, zdjecie from produkty where Rodzaje_id = 1 or Rodzaje_id = 2");
    while($row = mysqli_fetch_assoc($query1)) {
        echo "<div><img src='".$row["zdjecie"]."' alt='warzywniak'><h5>".$row["nazwa"]."</h5>
        <p>opis: ".$row["opis"]."</p><p>na stanie: ".$row["ilosc"]."</p><h2>".$row["cena"]."zł</h2></div>";
    }
    mysqli_close($link);
?>
    </div>
    <div class="footer">
        <form method="POST" action="#">
            <label for="nazwa">Nazwa:</label>
            <input type="text" name="nazwa" id="nazwa">
            <label for="cena">Cena:</label>
            <input type="text" name="cena" id="cena">
            <button type="submit">Dodaj produkt</button>
        </form>
        <p>Stronę wykonał: 12312312312</p>
    </div>
</body>
</html>



