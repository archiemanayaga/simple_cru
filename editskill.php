<?php 
  include 'DB/index.php';

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectSkill = $db->prepare('select * from skills where id = ?');
    $selectSkill->execute([$id ]);
    $skill = $selectSkill->fetch();
  }

  if(isset($_POST['name'])) {
    try {
      $id=$_POST['id'];
      $name=$_POST['name'];
      $desc=$_POST['description'];

      $ins = $db->prepare('update skills set name = ?, description = ? where id = ?');
      if($ins->execute([$name, $desc, $id])) {
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
  <h2>Edit Skill</h2>
  <form method="post" action="editskill.php"> 
  <input type="hidden" name="id" value="<?php echo $skill['id'];?>">
  <label for="name">Name: </label>
  <input type="text" id="name" name="name" value="<?php echo $skill['name'];?>"><br><br>
  <label for="description">Description</label>
  <textarea id="description" name="description"><?php echo $skill['description'];?></textarea><br><br>
  <button>save</button>
  </form>



</body>
</html>