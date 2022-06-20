<?php
session_start();
$id = $_REQUEST['post_id'];
//$kniga = $mass1['.$id.']; echo implode('|', array(1, 2, 3));
//$autor = $mass2['.$id.'];
$db = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
$rows2 = $db->query("SELECT * FROM news WHERE id='$post_id'")->fetch();
$db->query("DELETE FROM `news` WHERE`id`= $id");
header("location: str/news.php");
?>