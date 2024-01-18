<!DOCTYPE html>

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1">
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
    integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
    crossorigin="anonymous"></script>
  <link href="css/jquery-confirm.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/menu.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="all" href="css/daterangepicker.css" />
  <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

  <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
  <script src="js/filter.js" type="text/javascript"></script>
  <script src="js/map.js" type="text/javascript"></script>
	<style>
        html, body, #map {
            width: 100%; height: 100%; padding: 0; margin: 0;
        }
  </style>

  <link rel="stylesheet" href="css/check.css">
  <link rel="stylesheet" href="css/main.css">

  <?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);

  include "settings.php";
  
  include "includes/db.php";
  
  //echo getPoints($link, $tablename);

  ?>
  <style media="screen">
    .daterangepicker {
      z-index: 99999999 !important;
      color: #000 !important;
    }

    #datepick {
      color: #4cae4c !important;
      font-size: 14px;
      height: 30px;
      text-align: center;
      border: 1px solid #5cb85c;
    }

    #update {
      background: #5cb85c;
      border-color: #4cae4c;
      margin-top: 4px;
    }

    @media (min-width: 992px) {
      .jconfirm .col-md-6 {
        width: 60%;
        margin-left: 20% !important;
      }
    }
  </style>
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
          <button id="update" class="applyBtn btn btn-sm btn-success" type="submit">Применить</button></div>
        </form>
        
        <ul>
        </ul>

      </div>
    </div>
  </div>

  <div class="menu">
    <div>Карта зарядных станций электромобилей</div>
    <!-- <div class="status">
      <p>Интервал<br>
        
      </p>
      <p>Группы: </p>
    </div> -->

    <ul class="mn">
      <li id="show"><i  class="fas fa-bars"></i></li>
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