<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style_aut.css">
    <title>МБУК БИМЦ Библиотека №4</title>

    <script>
        function Menu_Ani()
        {
            $(this).hide();
        }
        function Reize()
        {
            const width = window.screen.availWidth;
            const height = window.screen.availHeight;
            window.resizeTo(width, height);
        } 
    </script>
</head>
<body onload="Reize()">
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
                $result = $conn->query ("SELECT * FROM `news` ORDER BY `id` DESC");
                $stat = $_SESSION['status'];
                if($stat == 'admin')
                {
                    echo "<form action='../../html/plus_news.html'><button class='but_katalog_adm_dob'><b>Добавить новость</b></button></form>";}
                    foreach ($result as $rows) 
                    {
                        $stat = $_SESSION['status'];
                        if($stat == 'admin')
                        {
                            echo "<div class='telo'>";
                                echo "<form action='../delete_news.php'>";
                                    echo "<div class='info_news_admin'>";
                                        echo "<center><h1 name='naz' class='Naz_news'>".$rows["h"]."</h1></center>";
                                        echo "<h3 class='txt_news'>".$rows["post"]."</h3>";
                                        echo "<center><img class='img_news' src='".$rows["img"]."'></center>";
                                        echo "<center><p class='data_news'>".$rows["data"]."</center></p>";
                                        echo "<div class='kn_admin'>";
                                            echo "<button class='but_news_adm'><b>УДАЛИТЬ</b></button>";
                                            echo "<input type='hidden' name='post_id' value='".$rows["id"]."'>";
                                        echo"</div>";
                                    echo "</div>";
                                echo "</form>";
                            echo "</div>";
                        }
                        else
                        {
                            echo "<div class='telo'>";
                                    echo "<center><h1 name='naz' class='Naz_news'>".$rows["h"]."</h1></center>";
                                    echo "<h3 class='txt_news'>".$rows["post"]."</h3>";
                                    echo "<center><img class='img_news' src='".$rows["img"]."'></center>";
                                    echo "<center><p class='data_news'>".$rows["data"]."</center></p>";
                            echo "</div>";
                        }
                    }
                $conn=null;
                ?>
                
            
        </main>
        <footer>
            <center><h5 class="footer_text">Работа выполнена Пронько Лидей ИС-18</h5></center>
        </footer>
    </div>   
</body>
</html>