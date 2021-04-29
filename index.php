<?php
  include('connect.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/index.css">
  <title>Поликлиника</title>
</head>
<body>
  <main class="container">
    <h1 class="main_header">Поликлиника</h1>

    <section class="form-card">
      <h4 class="form-card__header">Получить перечень палат, в которых дежурит выбранная медсестра</h4>
      <select name="nursename" id="nursename" class="form-card_select">
        <?php
          try {
            $sql = 'SELECT DISTINCT `name` from `nurse`';
            foreach($dbh->query($sql) as $row)
            {
              $name = $row[0];
              print "<option value='$name'>$name</option>";
            }
          } catch (PDOException $ex) {
            die("Error! " . $ex->GetMessage() . "<br/>");
          }
        ?>
      </select>
      <input type="button" value="Получить" class="form-card_btn" id="get-ward-btn">
    </section>

    <section id="get-ward-result">
    </section>

    <section class="form-card">
      <h4 class="form-card__header">Получить перечень медсестр из указаного отделения</h4>
      <select name="department" id="department" class="form-card_select">
        <?php
          try {
            $sql = 'SELECT DISTINCT `department` from nurse';
            foreach($dbh->query($sql) as $row)
            {
              $name = $row[0];
              print "<option value='$name'>$name</option>";
            }
          } catch (PDOException $ex) {
            die("Error! " . $ex->GetMessage() . "<br/>");
          }
        ?>
      </select>
      <input type="button" value="Получить" class="form-card_btn" id="get-nurse-btn">
    </section>

    <section id="get-nurse-result">
    </section>

    <section class="form-card">
      <h4 class="form-card__header">Получить перечень дежурств в указанную смену</h4>
      <select name="shift" id="shift" class="form-card_select">
        <?php
          try {
            $sql = 'SELECT DISTINCT `shift` from nurse';
            foreach($dbh->query($sql) as $row)
            {
              $name = $row[0];
              print "<option value='$name'>$name</option>";
            }
          } catch (PDOException $ex) {
            die("Error! " . $ex->GetMessage() . "<br/>");
          }
        ?>
      </select>
      <input type="button" value="Получить" class="form-card_btn" id="get-shift-btn">
    </section>

    <section id="get-shift-result">
    </section>
  </main>

  <script src="./js/getWard.js"></script>
  <script src="./js/getNurse.js"></script>
  <script src="./js/getShift.js"></script>
</body>
</html>