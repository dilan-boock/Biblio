<?php
$image = $_REQUEST['img'];
$naz = $_REQUEST['naz'];
$autor = $_REQUEST['autor'];
$god = $_REQUEST['god'];
$opis = $_REQUEST['opis'];
$kolvo = $_REQUEST['kolvo'];

$conn = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
$rows = $conn->query ("SELECT * FROM `katalog` WHERE `nazvanie` ='".$naz."'")->fetch();

if($naz == $rows['naz']){
    echo "<script> alert('Такая книга существует!') </script>";
    header("location: ../html/plus_kniga.html");
}
else
{
    $conn->query ("INSERT INTO `katalog`(`img`, `nazvanie`, `autor`, `god`, `kolvo`, `opisanie`) VALUES ('$image','$naz','$autor','$god','$kolvo','$opis')");
    header("location: ../php/str/catalog.php");
}
?>