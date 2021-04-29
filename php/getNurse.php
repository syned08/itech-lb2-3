<?php
  header('Content-Type: text/xml');
  header('Cache-Control: no-cache, most-revalidate');
  include('../connect.php');

  echo '<?xml version="1.0" encoding="utf-8" ?>';

  if(!isset($_GET['department']))
  {
    echo "<error>Ошибка! Отсутствуют данные об отделении!</error>";
    exit;
  }

  $department = $_GET['department'];

  try {
    $sql = "SELECT `name` FROM nurse WHERE department=:department";

    $sth = $dbh->prepare($sql);
    $sth->bindValue(':department', $department, PDO::PARAM_STR);
    $sth->execute();

    $nurses = $sth->fetchAll(PDO::FETCH_NUM);

    echo '<nurses>';

    foreach ($nurses as $nurse) {
      print "<nurse>$nurse[0]</nurse>";
    }

    echo '</nurses>';
  } catch (PDOException $ex) {
    die("Error! " . $ex->GetMessage() . "<br/>");
  }
?>
