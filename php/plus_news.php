<?php
$h = $_REQUEST['h'];
$post = $_REQUEST['post'];
$image = $_REQUEST['img'];
$data = date('Y-m-d');
echo "$image";
echo "$data";
$conn = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
$conn->query ("INSERT INTO `news`(`h`, `post`, `img`, `data`) VALUES ('$h','$post','$image','$data')");
header("location: ../php/str/news.php");
?>