
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
    $result = mysqli_query($GLOBALS['connection'], " SELECT * FROM `grades` WHERE `id` = '$id' ");
    $result2 = mysqli_query($GLOBALS['connection'], " SELECT * FROM users WHERE id = '$id' ");
    $r = mysqli_fetch_assoc($result2);
    $id = $r['id'];
    $n = $r['name'];
    }
    catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    if($role != 'Student'){
      echo "<h1> Access Denied</h1>";
    }
    else{
  ?>
<h4>Student page</h4>
<br>
<h3>Info</h3>
Student ID: <?php echo $id?>
<br>
Student Name: <?php echo $n?>
<hr>
  <h3>Grades</h3>
  <table>
  <tr>

    <th>Course</th>
    <th>Grades</th>
    <tbody>
         <?php
         if($result)
         while($row = mysqli_fetch_array($result)){
         ?>
             <tr>

                 <td><?php echo $row['course']; ?></td>
                 <td><?php echo $row['grade']; ?></td>
            <?php echo "<tr>";
          }
               ?>
          </tbody>
</table>

<?php } 
    }?>


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