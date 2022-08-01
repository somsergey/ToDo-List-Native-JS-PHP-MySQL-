<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  class Db {

    public $mysql;

    function __construct() {
      $this->mysql = new mysqli('localhost', 'root', 'q1w2e3', 'todo_db') or die('problem');
    }

    function update_by_id($id, $exposition) {
      $query = 'UPDATE todo SET $exposition = ? WHERE id = ? LIMIT 1';

      if ($stmt = $this->mysql->prepare($query)) {
        $stmt->bind_param('si', $exposition, $id);
        $stmt->execute();
        return 'done';
      }
    }
  }
?>