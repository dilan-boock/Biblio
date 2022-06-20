<?php
$fio = $_REQUEST['fio'];
$data = $_REQUEST['data'];
$number = $_REQUEST['number'];
$email = $_REQUEST['email'];
$password = $_REQUEST['pass'];
//$status = $_REQUEST['status'];
//$repa = $_REQUEST['repa'];
//$datta = strrev($data);

$conn = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
$rows = $conn->query ("SELECT * FROM `users` WHERE `number` ='".$number."'")->fetch();
if($number == $rows['number'] || $email == $rows['email']){
    echo "<script> alert('Такой пользователь существует! Так сказала Аня!') </script>";
    header("location: ../html/registr.html");
}
else
{
    $conn->query ("INSERT INTO `users` (`fio`, `data`, `number`, `email`, `password`) VALUES ('$fio', '$data', '$number', '$email', '$password')");
    header("location: ../html/autoriz.html");
}





//$rows = $conn->query("SELECT * FROM users WHERE `number`='".$number."'")->fetch();
//if($number != $rows['number'])
//{
//$sql = "INSERT INTO `users` (`fio`, `data`, `number`, `email`, `password`,`status`, `repa`) values (".$fio.", ".$datta.", ".$number.", ".$email.", ".$password.", 'user','250')";
//$stmt = $conn->prepare($sql);
//$result = $stmt->execute();
//if($result)
//{
  //  header("location: ../html/autoriz.html");
//}
//else
//{
//    header("location: ../");
//}
/*if($pidr!=false)
//{
//    header("location: ../html/autoriz.html");
//}
else 
{
    header("location: ../");
}*/
//}
/*else
{
    //alert("Такой пользователь уже зарегистрирован!");
    header("location: ../");
}*/
?>