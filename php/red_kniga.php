<?php
$id_sohr = $_REQUEST['sess_id'];
$pole = $_REQUEST['pole'];
$post_id = $_REQUEST['post_id'];
$conn = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
$rows2 = $conn->query("SELECT * FROM katalog WHERE id='$post_id'")->fetch();
$rows1 = $conn->query("SELECT * FROM bron WHERE id='".$rows2["nazvanie"]."'")->fetch();
$naz = $rows2["nazvanie"];
if($id_sohr == 1)
{
    $conn->query ("UPDATE `katalog` SET `img` = '$pole' WHERE `id`='$post_id'");
    header("location: ../php/str/catalog.php");
}
else if($id_sohr == 2)
{
    $conn->query ("UPDATE `katalog` SET `nazvanie` = '$pole' WHERE `id`='$post_id'");
    $conn->query ("UPDATE `bron` SET `nazwanie` = '$pole' WHERE `id`='$post_id'");
    header("location: ../php/str/catalog.php");
}
else if($id_sohr == 3)
{
    $conn->query ("UPDATE `katalog` SET `autor` = '$pole' WHERE `id`='$post_id'");
    header("location: ../php/str/catalog.php");
}
else if($id_sohr == 4)
{
    $conn->query ("UPDATE `katalog` SET `god` = '$pole' WHERE `id`='$post_id'"); 
    header("location: ../php/str/catalog.php");
}
else if($id_sohr == 5)
{
    $conn->query ("UPDATE `katalog` SET `kolvo` = '$pole' WHERE `id`='$post_id'");
    header("location: ../php/str/catalog.php");
}
else
{
    $conn->query ("UPDATE `katalog` SET `id`='$post_id' WHERE `opisanie` = '$pole'");
    header("location: ../php/str/catalog.php");
}
?>