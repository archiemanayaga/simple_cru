<?php

include 'DB/index.php';

$search = '';
$sql = 'select * from skills';

if(isset($_GET['search'])) {
  $search = $_GET['search']."%";
  $sql = 'select * from skills where name like ?';

  try {
    $selectAll = $db->prepare($sql);
    $selectAll->execute([$search]);
    $skills = $selectAll->fetchAll();
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
} else {
  try {
    $selectAll = $db->query($sql);
    $selectAll->execute();
    $skills = $selectAll->fetchAll();
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Skill Test</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php
    echo "<a href='skill-test/addskill.php'>Add New Skill</a>";
  ?>
  <br/><br/>
  <form action="skill-test">
    <label for="search">Search</label>
    <input type="text" name="search" id="search">
  </form>
  <?php
    foreach($skills as $skill) {
      $id = $skill['id'];
      $name = $skill['name'];
      $description = $skill['description'];
    
      echo "<h3>$id - $name - <a href='skill-test/editskill.php?id=$id'>Edit</a></h3>";
      echo "<p>$description</p>";
    }
  ?>
</body>
</html>