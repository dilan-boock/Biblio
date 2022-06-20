<?php
session_start();
$fio = $_SESSION['name'];
$id = $_REQUEST['post_id'];
//$kniga = $mass1['.$id.']; echo implode('|', array(1, 2, 3));
//$autor = $mass2['.$id.'];
$db = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
$rs = $db->query("SELECT * FROM katalog WHERE id='$id'")->fetch();
$new_kolvo = $rs["kolvo"]-1;
$db->query ("UPDATE `katalog` SET `kolvo` = '$new_kolvo' WHERE `id`='$id'");
$book_name = $rs['nazvanie'];
$date = date("Y-m-d H:i:s");
$d = date("d")+2;
$date2 = date("Y-m-$d");
$phone = $_SESSION['number'];
$insert = $db->query("INSERT INTO bron VALUES ($id, '$fio', '$phone', '$book_name', '$date', '$date2')");
header("location: ../php/str/catalog.php");

//echo "<script>alert(".$id.")</script>";
//echo "<script>alert('Ваше фио: ".$fio.", Ваша книга: ".$kniga.", ".$autor."')</script>";

?>