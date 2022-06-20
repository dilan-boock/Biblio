<?php
$log = $_REQUEST['log'];
$pass = $_REQUEST['pass'];

$conn = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
$rows = $conn->query("SELECT * FROM users WHERE number='".$log."'")->fetch();
if($log == $rows['number'] && $pass == $rows['password'])
{
    session_start();
    $_SESSION['name'] = $rows['fio'];
    $_SESSION['number'] = $rows['number'];
    $_SESSION['status'] = $rows['status'];
    header("location: ../php/str/catalog.php");
    /*if($rows['status'] == 'admin')
    {
        header("location: ../php/str/catalog_admin.php");
    }
    else
    {
        header("location: ../php/str/catalog.php");
    } */ 
} 
else 
{
    if($log != $rows['number'])
    {
        echo "<script>alert('У вас не правильный логин')</script>";
    }
    else
    {
        echo "<script>alert('У вас не правильный пароль')</script>";
    }
    //header("location: ../html/autoriz.html");
}
?>