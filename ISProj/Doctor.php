<?php
include 'template.php';

function content(){
$t = $_SESSION['token'];
$k = $GLOBALS['key'];
$result ="";
try{
$decoded =  JWT::decode($t, $k, array('HS256'));
$decoded_tok = (array) $decoded;
$id = $decoded_tok['uid'];
$role = $decoded_tok['role'];
}
catch(Exception $e){
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
    if ($role != 'DR'){
       echo "<h1> Access Denied</h1>";
    }
else{
    $q = "SELECT * FROM users WHERE role = 'Student' ";
    $qq = "SELECT * FROM users JOIN grades ON users.id=grades.id WHERE role = 'Student' ";
    $result = mysqli_query($GLOBALS['connection'], $qq);   
    $result2 = mysqli_query($GLOBALS['connection'], $q);
  ?>
  <h5>Doctor's Page</h5>
  
  <br>

  <h3>Users</h3>
  <table>
  <tr>
    <th>ID</th>
    <th>Name</th>

    <tbody>
         <?php
        if($result){
         while($row = mysqli_fetch_array($result2)){
         ?>
             <tr>
                 <td><?php echo $row['id']; ?></td>
                 <td><?php echo $row['name']; ?></td>

            <?php echo "<tr>";
          }
        }
               ?>
          </tbody>
</table>

  <h3>Grades</h3>
  <table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Course</th>
    <th>Grade</th>
    <tbody>
         <?php
        if($result){
         while($row = mysqli_fetch_array($result)){
         ?>
             <tr>
                 <td><?php echo $row['id']; ?></td>
                 <td><?php echo $row['name']; ?></td>
                 <td><?php echo $row['course']; ?></td>
                 <td><?php echo $row['grade']; ?></td>
            <?php echo "<tr>";
          }
        }
               ?>
          </tbody>
</table>

<?php ?>


<style>
table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  width: 100%;
},
th {
  height: 50px;
}

</style>
<br>
<br>
<hr>
<h2>EDIT Grade</h2>
<form method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

ID: <input type='number' name='id' size='20'>
Course: <input type='text' name='course' size='20'>
Grade: <input type='text' name='garde' size='20'>

<input type='submit' name='edit' value='Edit'>

</form>

<?php
if(isset($_POST['garde']) && isset($_POST['id'])){
    $cours =$_POST['course'];
    $grades =$_POST['garde'];
    $id = $_POST['id'];
    mysqli_query($GLOBALS['connection'], "UPDATE `grades` SET `grade`= '$grades'  WHERE `id`= '$id' AND `course` = '$cours'  ");
    header("Refresh:0");
}
?>
<br>
<hr>
<br>
<h2>ADD Grade</h2>
 <form method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

 ID: <input type='number' name='Id' size='20'>
 Course: <input type='text' name='Course' size='20'>
 Grade: <input type='text' name='Grade' size='20'>

    <input type='submit' name='Add' value='Add'>
 </form>
 
 <?php 
 if(isset($_POST['Grade']) && isset($_POST['Id']) && isset($_POST['Course'])){
    $id2 = $_POST['Id'];
    $Course2 =$_POST['Course'];
    $grades2 =$_POST['Grade'];
 
    mysqli_query($GLOBALS['connection'], "INSERT INTO `grades`(`id`, `course`, `grade`) VALUES ('$id2','$Course2','$grades2')");
    header("Refresh:0");
 }
}
}
?>
