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
        </header>
        <main>
            <menu>
                <ul class="menu">
                    <li class="menu_statick">
                        <a href="../../index.html"><img class="menu_img" src="../../sourse/img/Главная.png"></a>
                    </li>
                    <li class="menu_statick">
                        <a href="news_copy.php"><img class="menu_img" src="../../sourse/img/Новостная лента.png"></a>
                    </li>
                    <li class="menu_statick">
                    <a href="../../html/autoriz.html"><img class="menu_img" src="../../sourse/img/Войти.png" onClick="popupWin = window.open('../../html/autoriz.html', 'contacts', 'location,width=600,height=400,top=0'); popupWin.focus(); return false;"></a>
                    </li>
               </ul>
            </menu>
            
                <?php
                session_start();
                $conn = new PDO('mysql:host=localhost; dbname=biblioteka', "root", "");
                $result = $conn->query ("SELECT * FROM `news` ORDER BY `id` DESC");
                foreach ($result as $rows) 
                    {
                    echo "<div class='telo'>";
                        echo "<center><h1 name='naz' class='Naz_news'>".$rows["h"]."</h1></center>";
                        echo "<h3 class='txt_news'>".$rows["post"]."</h3>";
                        echo "<center><img class='img_news' src='".$rows["img"]."'></center>";
                        echo "<center><p class='data_news'>".$rows["data"]."</center></p>";
                    echo "</div>";
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