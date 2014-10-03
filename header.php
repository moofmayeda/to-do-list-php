<?php

class Task {
  public $id;
  public $name;
  public $description;

  public function __construct($id, $name, $description) {
    $this -> id = $id;
    $this -> name = $name;
    $this -> description = $description;
  }
}
DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DATABASE', 'todos');

?>
