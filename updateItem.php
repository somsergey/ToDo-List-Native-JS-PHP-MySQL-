<?php
  require 'db.php';
  $db = new Db();
  $response = $db->update_by_id($_POST['id'], $_POST['exposition']);
?>