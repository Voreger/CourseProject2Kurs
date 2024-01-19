<!DOCTYPE html>

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1">
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
    integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/menu.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=c45b5ce2-6594-421a-8874-98f14765be8e" type="text/javascript"></script>
  <script src="js/map.js" type="text/javascript"></script>
  <script src="js/route.js" type="text/javascript"></script>
	<style>
        html, body, #map {
            width: 100%; height: 100%; padding: 0; margin: 0;
        }
  </style>

  <link rel="stylesheet" href="css/check.css">
  <link rel="stylesheet" href="css/main.css">

  <?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);

  include "includes/settings.php";
  
  include "includes/db.php";
  
  //echo getPoints($link, $tablename);

  ?>
</head>

<body>

  <div id="nav" class="navigation">
    <div class="navigation__inner">
      <div class="nopad">
        <h1 class="logo smooth-scroll" href="#top">Карта зарядных станций электромобилей</h1>
        <i class="fas fa-times close-menu" onclick="$('#show').click();"></i>
        <p>Выберите мощность:</p>
        <form action="index.php" method="get">
          <input type="checkbox" name="22kWt" id="22kWt" value="yes" <?php if (isset($_GET["22kWt"])) {echo "checked";}?>>
          <label for="22kWt">22 кВт</label>
          <p>22 кВт</p>          
          <input type="checkbox" name="50kWt" id="50kWt" value="yes" <?php if (isset($_GET["50kWt"])) {echo "checked";}?>>
          <label for="50kWt">50 кВт</label>
          <p>50 кВт</p>
          <input type="checkbox" name="60kWt" id="60kWt" value="yes" <?php if (isset($_GET["60kWt"])) {echo "checked";}?>>
          <label for="60kWt">60 кВт</label>
          <p>60 кВт</p>
          <button id="update" class="applyBtn btn btn-sm btn-success" type="submit">Применить</button>
        </form>
        
        <ul>
        </ul>

      </div>
    </div>
  </div>

  <div class="menu">
    <div>Карта зарядных станций электромобилей</div>
    <ul class="mn">
      <li><a href="index.php">Главная</a></li>
      <li><a href="aboutUs.php">О нас</a></li>
      <li id="show"><i  class="fas fa-bars"></i></li>
      <li><a href="https://vk.com/vgorkov2013" target="_blank"><i class="fab fa-vk"></i></a></li>
  	  <li><a href="https://github.com/Voreger/CourseProject2Kurs" target="_blank"><i class="fab fa-github"></i></a></li>
    </ul>
  </div>

  <div id="map"></div>

  <footer><a href="" target="_blank">Карта зарядных станций электромобилей</a></footer>

  <script type="text/javascript">
    var btn = document.getElementById('show');
    var nav = document.getElementById('nav');

    btn.addEventListener('click', function () {
      nav.classList.toggle('active');
    });

  </script>
</body>

</html>

<?php
mysqli_close($link);
?>