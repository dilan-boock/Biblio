<?php
session_start();
$id = $_REQUEST['post_id'];
//$kniga = $mass1['.$id.']; echo implode('|', array(1, 2, 3));
//$autor = $mass2['.$id.'];
$db = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
$rows2 = $db->query("SELECT * FROM katalog WHERE id='$post_id'")->fetch();
$rows1 = $db->query("SELECT * FROM bron WHERE id='".$rows2["nazvanie"]."'")->fetch();
$db->query("DELETE FROM `bron` WHERE`id`= $id");
$insert = $db->query("DELETE FROM `katalog` WHERE`id`=$id");
header("location: str/catalog.php");

//echo "<script>alert(".$id.")</script>";
//echo "<script>alert('Ваше фио: ".$fio.", Ваша книга: ".$kniga.", ".$autor."')</script>";

?>