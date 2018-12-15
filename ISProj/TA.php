
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
    $q = "SELECT * FROM users JOIN grades ON users.id=grades.id WHERE role = 'Student' ";

   $result = mysqli_query($GLOBALS['connection'], $q);
        }
    catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    if($role != 'TA'){
      echo "<h1> Access Denied</h1>";
    }
    else{
  ?>
  <h4> TA's page</h4>
  <h3> Student Grades</h3>
  <table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Course</th>
    <th>Grades</th>
    <tbody>
         <?php
         while($row = mysqli_fetch_array($result)){
         ?>
             <tr>
                 <td><?php echo $row['id']; ?></td>
                 <td><?php echo $row['name']; ?></td>
                 <td><?php echo $row['course']; ?></td>
                 <td><?php echo $row['grade']; ?></td>
            <?php echo "<tr>";
          }
               ?>
          </tbody>
</table>

<?php } }?>


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