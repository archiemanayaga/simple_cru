<?php 
  include 'DB/index.php';

  if(isset($_POST['name'])) {
    try {
      $name=$_POST['name'];
      $desc=$_POST['description'];

      $ins = $db->prepare('insert into skills (name, description) values(?,?)');
      if($ins->execute([$name, $desc])) {
        header('location: ../skill-test');
      }
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
  <title>skilltest</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
  <h2>Create New Skill</h2>
  <form method="post" action="addskill.php"> 
  <label for="name">Name: </label>
  <input type="text" id="name" name="name"><br><br>
  <label for="description">Description</label>
  <textarea id="description" name="description"></textarea><br><br>
  <button>save</button>
  </form>



</body>
</html>