<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style_aut.css">
    <script src="../../js/animations.js"></script>
    <title>МБУК БИМЦ Библиотека №4</title>

    <script>
        function Menu_Ani()
        {
            $(this).hide();
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <header>
            <img class="logo" src="../../sourse/img/logo.png">
            <h1 class="header_text">МБУК БИМЦ ОДИНЦОВСКАЯ БИБЛИОТЕКА №4</h1>
            <h3 class="hello">Приветствую вас, <?php session_start(); echo $_SESSION['name']?></h3>
        </header>
        <main>
            <menu>
                <ul class="menu">
                    <li class="menu_statick">
                        <a href="../../index_aut.html"><img class="menu_img" src="../../sourse/img/Главная.png"></a>
                    </li>
                    <li class="menu_statick">
                        <a href="news.php"><img class="menu_img" src="../../sourse/img/Новостная лента.png"></a>
                    </li>
                    <li class="menu_statick">
                        <img class="menu_img" src="../../sourse/img/menu.png" onClick="popupWin = window.close();">
                    </li>
                    <li class="autor_users">
                        <a href="LK.php"><img class="menu_img" src="../../sourse/img/Личный кабинет.png"></a>
                    </li>
                    <li class="autor_users">
                        <a href="catalog.php"><img class="menu_img" src="../../sourse/img/Каталог.png"></a>
                    </li>
               </ul>
            </menu>
        
            <?php
                $conn = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
                $stat = $_SESSION['status'];
                $logg = $_SESSION['number'];
                $result = $conn->query ("SELECT * FROM bron WHERE useus_number = '$logg'");
                $rows = $conn->query ("SELECT * FROM bron WHERE useus_number = '$logg'")->fetch();
                $result2 = $conn->query("SELECT * FROM bron");
                echo"<h2 class='h1_lk'><center>ЗАБРОНИРОВАННЫЕ КНИГИ</center></h2>";
                echo "<a href='catalog.php'><button class='but_katalog_adm_dob'><b>В КАТАЛОГ</b></button></a>";
                if($stat == 'admin')
                    {
                        foreach ($result2 as $rows)
                        {
                            $rows3 = $conn->query("SELECT * FROM katalog WHERE nazvanie='".$rows["nazwanie"]."'")->fetch();
                            echo"<div class='telo'>";
                                echo"<div class='bron_users_admin'>";
                                    echo "<div class='dann'>";
                                        echo"<h3 class='text'>".$rows['users_name']."</h3>";
                                        echo"<h3 class='text'>".$rows['useus_number']."</h3>";
                                    echo "</div>";
                                    echo"<img class='kniga_img' src='".$rows3['img']."'>";
                                    echo"<div class='kniga_text'>";
                                        echo "<h1 name='naz' class='Naz_katalog'>".$rows['nazwanie']."</h1>";
                                        echo "<h3 name='autor' class='txt_katalog'>".$rows3['autor']."</h3>";
                                        echo "<h3 class='txt_katalog'>".$rows3['god']."</h3>";
                                    echo"</div>";
                                    echo"<form class='knopki' action='../../php/otmena.php'>";
                                        echo"<button class='but_otm'>ОТМЕНА</button>";
                                        echo "<input type='hidden' name='fio' value='".$rows['nazwanie']."'>";
                                        echo "<input type='hidden' name='number' value='".$rows['useus_number']."'>";
                                        echo "<input type='hidden' name='post_id' value='".$rows3['id']."'>";
                                    echo"</form>";
                                echo"</div>";
                            echo"</div>";
                        }
                    }
                else
                {
                    foreach ($result as $rows) 
                    {
                        if(!empty($rows['useus_number']))
                        {
                            $rows2 = $conn->query("SELECT * FROM katalog WHERE nazvanie='".$rows['nazwanie']."'")->fetch();
                            echo"<div class='telo'>";
                                echo"<div class='bron_users'>";
                                    echo"<img class='kniga_img' src='".$rows2['img']."'>";
                                    echo"<div class='kniga_text'>";
                                        echo "<h1 name='naz' class='Naz_katalog'>".$rows['nazwanie']."</h1>";
                                        echo "<h3 name='autor' class='txt_katalog'>".$rows2['autor']."</h3>";
                                        echo "<h3 class='txt_katalog'>".$rows2['god']."</h3>";
                                    echo"</div>";
                                    echo"<form action='../../php/otmena.php'>";
                                        echo"<button class='but_otm'>ОТМЕНА</button>";
                                        echo "<input type='hidden' name='post_id' value='".$rows2['id']."'>";
                                    echo"</form>";
                                    echo"</div>";
                                echo"</div>";
                            echo"</div>";
                        }
                    }
                }
            ?>  
        </main>
        <footer>
            <center><h5 class="footer_text">Работа выполнена Пронько Лидей ИС-18</h5></center>
        </footer>
    </div>   
</body>
</html>