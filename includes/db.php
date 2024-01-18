<?php
$link = mysqli_connect($db_host, $db_user, $db_password, $db_database);
$tablename = "data";

/* проверяем соединение */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


if (isset($_GET['22kWt']) && $_GET['22kWt']=="yes"){
  $jsonData = getLowPoints($link,$tablename);
  echo '<script id="1" data="' . htmlspecialchars($jsonData) . '"></script>';
}
if (isset($_GET['50kWt']) && $_GET['50kWt']=="yes"){
  $jsonData2 = getMidPoints($link,$tablename);
  echo '<script id="2" data="' . htmlspecialchars($jsonData2) . '"></script>';
}
if (isset($_GET['60kWt']) && $_GET['60kWt']=="yes"){
  $jsonData3 = getMaxPoints($link,$tablename);
  echo '<script id="3" data="' . htmlspecialchars($jsonData3) . '"></script>';
}
if(!isset($_GET["22kWt"])&&!isset($_GET["50kWt"])&&!isset($_GET["60kWt"])){
  $jsonData = getLowPoints($link,$tablename);
  echo '<script id="1" data="' . htmlspecialchars($jsonData) . '"></script>';
  $jsonData2 = getMidPoints($link,$tablename);
  echo '<script id="2" data="' . htmlspecialchars($jsonData2) . '"></script>';
  $jsonData3 = getMaxPoints($link,$tablename);
  echo '<script id="3" data="' . htmlspecialchars($jsonData3) . '"></script>';
}

function getAllPoints($link, $tablename) {
    $result = mysqli_query($link, "SELECT Name, AdmArea, District, Address, Longitude, Latitude  FROM ".$tablename."");
    $res_assoc = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return json_encode($res_assoc,JSON_HEX_QUOT | JSON_HEX_TAG);
}

function getLowPoints($link, $tablename) {
  $result = mysqli_query($link, "SELECT Name, AdmArea, District, Address, Longitude, Latitude  FROM ".$tablename." WHERE name LIKE(\"%22 кВт\")");
  $res_assoc = mysqli_fetch_all($result,MYSQLI_ASSOC);
  return json_encode($res_assoc,JSON_HEX_QUOT | JSON_HEX_TAG);
}

function getMidPoints($link, $tablename) {
  $result = mysqli_query($link, "SELECT Name, AdmArea, District, Address, Longitude, Latitude  FROM ".$tablename." WHERE name LIKE(\"%50 кВт\")");
  $res_assoc = mysqli_fetch_all($result,MYSQLI_ASSOC);
  return json_encode($res_assoc,JSON_HEX_QUOT | JSON_HEX_TAG);
}

function getMaxPoints($link, $tablename) {
  $result = mysqli_query($link, "SELECT Name, AdmArea, District, Address, Longitude, Latitude  FROM ".$tablename." WHERE name LIKE(\"%60 кВт\")");
  $res_assoc = mysqli_fetch_all($result,MYSQLI_ASSOC);
  return json_encode($res_assoc,JSON_HEX_QUOT | JSON_HEX_TAG);
}




