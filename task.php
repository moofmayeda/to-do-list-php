<?php include ("header.php");

if (isset($_GET["id"])) {
  $task_id = $_GET["id"];
  $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "SELECT * FROM tasks WHERE id =" . $task_id;

  $result = mysqli_query($con,$sql);

  while($row = mysqli_fetch_array($result)) {
    $task = new Task($row['id'], $row['name'], $row['description']);
  }
  mysqli_close($con);
}

if (!isset($task)) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Task</title>
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
</head>
<body>
  <div class="container">
    <div class="page-header">
      <h1><?php echo $task -> name; ?></h1>
    </div>
    <p><?php echo $task -> description; ?></p>
  </div>
</body>
</html>
