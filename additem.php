<?php
  require 'db.php';
  $db = new Db();

  if (isset($_POST['additem'])) {
    echo $_POST['title'], $_POST['exposition'];
    $query = 'INSERT INTO todo(title, exposition) VALUES(?, ?)';

    if ($stmt = $db->mysql->prepare($query)) {
      $stmt->bind_param('ss' ,$_POST['title'], $_POST['exposition']);
      $stmt->execute();
      header('location: index.php');
    }
    else die($db->mysql->error);
  }
?>