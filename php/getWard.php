<?php
  include('../connect.php');

  if(!isset($_GET['nursename']))
  {
    echo "Ошибка! Отсутствуют данные о медсестре!";
    exit;
  }

  $nurse = $_GET['nursename'];
  echo "<h1 class=\"sub-header\">Палаты, в которых дежурит медсестра '$nurse'</h1>";

  try {
    $sql = "SELECT ward.name FROM ward, nurse, nurse_ward WHERE nurse.name=:nurse AND id_nurse=fid_nurse AND fid_ward=id_ward";

    $sth = $dbh->prepare($sql);
    $sth->bindValue(':nurse', $nurse, PDO::PARAM_STR);
    $sth->execute();

    $wards = $sth->fetchAll(PDO::FETCH_NUM);

    $result = "<section class=\"wrapper-card\">";

    foreach ($wards as $ward) {
      $result .= "<div class=\"card\">$ward[0]</div>";
    }

    $result .= "</section>";
    print $result;
  } catch (PDOException $ex) {
    die("Error! " . $ex->GetMessage() . "<br/>");
  }
?>