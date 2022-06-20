<?php
session_start();
$stat = $_SESSION['status'];
if($stat == 'admin')
{
    $naz = $_REQUEST['fio'];
    $number = $_REQUEST['number'];
    $id = $_REQUEST['post_id'];
    $db = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
    $rows2 = $db->query("SELECT * FROM bron WHERE useus_number='$number'")->fetch();
    if($rows2['nazwanie']==$naz)
    {
        $rows = $db->query("SELECT * FROM katalog WHERE id='$id'")->fetch();
        $new_kolvo = $rows["kolvo"]+1;
        $db->query ("UPDATE `katalog` SET `kolvo` = '$new_kolvo' WHERE `nazvanie`='$naz'");
        $insert = $db->query("DELETE FROM `bron` WHERE`id`=".$id."");
        header("location: str/LK.php");
    }
}
else
{
    $id = $_REQUEST['post_id'];
    $db = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
    $rows2 = $db->query("SELECT * FROM katalog WHERE id='$id'")->fetch();
    $rows1 = $db->query("SELECT * FROM `bron` WHERE`nazwanie` ='".$rows2["nazvanie"]."'")->fetch();
    $new_kolvo = $rows2["kolvo"]+1;
    $db->query ("UPDATE `katalog` SET `kolvo` = '$new_kolvo' WHERE `id`='$id'");
    $insert = $db->query("DELETE FROM `bron` WHERE`id`=".$rows1["id"]."");
    header("location: str/LK.php");
}
?>