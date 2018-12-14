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
   $result = mysqli_query($GLOBALS['connection'], " SELECT * FROM `grades`");
        }
    catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
  ?>
  <table>
  <tr>
    <th>Id</th>
    <th>Course</th>
    <th>Grades</th>
    <tbody>
         <?php
         while($row = mysqli_fetch_array($result)){
         ?>
             <tr>
                 <td><?php echo $row['id']; ?></td>
                 <td><?php echo $row['course']; ?></td>
                 <td><?php echo $row['grade']; ?></td>
            <?php echo "<tr>";
          }
               ?>
          </tbody>
</table>

<?php }?>


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

<script type="text/javascript">
function edit(){
  window.location.replace("index.php");
}

</script>

<form method='POST' action="" >

ID: <input type='number' name='Id' size='20'>
Grade: <input type='text' name='Grade' size='20'>

<input type='submit' name='Submit' value='Submit'>

<?php
    $grades =$_POST['Grade'];
    $id = $_POST['Id'];
    mysqli_query($GLOBALS['connection'], "UPDATE `grades` SET `grade`= '$grades'  WHERE `id`= '$id' ");

?>
</form>