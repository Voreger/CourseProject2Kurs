<?php
class Database
{
  private static $instance;
  private $mysqli;

  private function __construct()
  {

    try {
      define("DB_HOST", "localhost");
      define("DB_USER", "root");
      define("DB_PASSWORD", "12345678");
      define("DB_DATABASE", "course_project");
      define("DB_TABLENAME", "data");
      $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
      if ($this->mysqli->connect_error) {
        throw new Exception('Ошибка подключения к базе данных: ' . $this->mysqli->connect_error);
      }
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  public function getConnection()
  {
    return $this->mysqli;
  }
}

$database = Database::getInstance();
$mysqli = $database->getConnection();

if (isset($_GET['22kWt']) && $_GET['22kWt'] == "yes") {
  $jsonData = getLowPoints($mysqli, DB_TABLENAME);
  echo '<script id="1" data="' . htmlspecialchars($jsonData) . '"></script>';
}
if (isset($_GET['50kWt']) && $_GET['50kWt'] == "yes") {
  $jsonData2 = getMidPoints($mysqli, DB_TABLENAME);
  echo '<script id="2" data="' . htmlspecialchars($jsonData2) . '"></script>';
}
if (isset($_GET['60kWt']) && $_GET['60kWt'] == "yes") {
  $jsonData3 = getMaxPoints($mysqli, DB_TABLENAME);
  echo '<script id="3" data="' . htmlspecialchars($jsonData3) . '"></script>';
}
if (!isset($_GET["22kWt"]) && !isset($_GET["50kWt"]) && !isset($_GET["60kWt"])) {
  $jsonData = getLowPoints($mysqli, DB_TABLENAME);
  echo '<script id="1" data="' . htmlspecialchars($jsonData) . '"></script>';
  $jsonData2 = getMidPoints($mysqli, DB_TABLENAME);
  echo '<script id="2" data="' . htmlspecialchars($jsonData2) . '"></script>';
  $jsonData3 = getMaxPoints($mysqli, DB_TABLENAME);
  echo '<script id="3" data="' . htmlspecialchars($jsonData3) . '"></script>';
}
function getLowPoints($link, $tablename)
  {
    $query = "SELECT Name, AdmArea, District, Address, Longitude, Latitude  FROM " . $tablename . " WHERE name LIKE(\"%22 кВт\")";
    $result = mysqli_query($link, $query);
    $res_assoc = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode($res_assoc, JSON_HEX_QUOT | JSON_HEX_TAG);
  }

  function getMidPoints($link, $tablename)
  {
    $query = "SELECT Name, AdmArea, District, Address, Longitude, Latitude  FROM " . $tablename . " WHERE name LIKE(\"%50 кВт\")";
    $result = mysqli_query($link, $query);
    $res_assoc = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode($res_assoc, JSON_HEX_QUOT | JSON_HEX_TAG);
  }

  function getMaxPoints($link, $tablename)
  {
    $query = "SELECT Name, AdmArea, District, Address, Longitude, Latitude  FROM " . $tablename . " WHERE name LIKE(\"%60 кВт\")";
    $result = mysqli_query($link, $query);
    $res_assoc = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode($res_assoc, JSON_HEX_QUOT | JSON_HEX_TAG);
  }