
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
    }
    catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    if($role != 'Student'){
      echo "<h1> Access Denied</h1>";
    }
    else{
  ?>
  <table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Course</th>
    <th>Grades</th>
    <tbody>
         <?php
         while($row = mysqli_fetch_array($result)){
         ?>
             <tr>
                 <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                 <td><?php echo $row['course']; ?></td>
                 <td><?php echo $row['grade']; ?></td>
                 <td><button type='button' onclick="edit()"> edit info </button></td>
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