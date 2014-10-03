<?php

$list = Array();

DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DATABASE', 'todos');

$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $newTaskName = $_POST['name'];
  $newTaskDescription = $_POST['description'];
  $sql = "INSERT INTO tasks (id, name, description) VALUES (NULL, '" . $newTaskName . "', '" . $newTaskDescription . "')";
  mysqli_query($con, $sql);
  header("Location: index.php");
  exit;
}
$result = mysqli_query($con,"SELECT * FROM tasks");

while($row = mysqli_fetch_array($result)) {
  array_push($list, $row['name']);
}
mysqli_close($con);

?>

<!DOCTYPE html>
<html>
<head>
  <title>My to-do list</title>
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
</head>
<body>
  <div class="container">
    <h1>To Do</h1>
    <ul>
      <?php foreach($list as $task) { ?>
            <?php echo "<li>" . $task . "</li>" ?>
        <?php } ?>
    </ul>
    <form method="post" action="index.php">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Task">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" id="description" name="description" placeholder="Description">
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
  </div>
</body>
</html>
