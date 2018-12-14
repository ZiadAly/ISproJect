<form action="Gradeshandle.php" method="POST">

  id <input type="number" name="id">
  <br/>
  name <input type="text" name="name">
  <br/>
  grade <input type="number" name=grade>
  <br/>

<button>Add</button>
<br/>
<?php

    $id =$_POST['id'];
    $Name = $_POST['name'];
    $grades = $_POST['grade'];

    $connection = mysqli_connect("localhost","root","","ISproJect");
    mysqli_query($connection, "INSERT INTO `grades`(`ID`, `Name`, `Grade`) VALUES ('$id','$Name','$grades')");
    $GLOBALS['result'] = mysqli_query($connection, "SELECT * FROM `grades`");
   // mysqli_query($connection, "UPDATE `grades` SET `Grade`='$grades' WHERE `ID` = '$id'")
?>
<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th {
  height: 50px;
}
</style>
</head>
<body>

<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Grades</th>
    <tbody>
         <?php
         while($row = mysqli_fetch_array($GLOBALS['result'])){
         ?>
             <tr>
                 <td><?php echo $row['ID']; ?></td>
                 <td><?php echo $row['Name']; ?></td>
                 <td><?php echo $row['Grade']; ?></td>
            <?php echo "<tr>";
          }
               ?>
          </tbody>
</table>




</body>
</html>