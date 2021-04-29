<?php
  header('Cache-Control: no-cache, most-revalidate');
  include('../connect.php');

  $shift = $_GET['shift'];

  try {
    $sql = "SELECT nurse.name, nurse.date, ward.name AS wardName FROM nurse, nurse_ward, ward WHERE nurse.shift=:shift AND nurse.id_nurse=nurse_ward.fid_nurse AND ward.id_ward=nurse_ward.fid_ward";

    $sth = $dbh->prepare($sql);
    $sth->bindValue(':shift', $shift, PDO::PARAM_STR);
    $sth->execute();

    $shifts = $sth->fetchAll(PDO::FETCH_OBJ);

    echo json_encode($shifts);
  } catch (PDOException $ex) {
    die("Error! " . $ex->GetMessage() . "<br/>");
  }
?>