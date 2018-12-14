<?php 
include 'template.php';

function content(){

    $tok = $_SESSION['token'];
    $k = $GLOBALS['key'];
    $result ="";
    try{
    $decoded =  JWT::decode($tok, $k, array('HS256'));
    $decoded_tok = (array) $decoded;
    $id = $decoded_tok['uid'];
    $role = $decoded_tok['role'];

    }
    catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

?>

<?php 
if ($role == 'Student' || $role == 'TA'||$role == 'DR' ){ 
    echo "<h4> Welcome " .$role .", Click below to enter your page.</h4> ";?>
    <button type='button' onclick="goto1()" <?php if($role != 'Student') {?> disabled="disabled" <?php }?> > click me ya Student </button>
    <button type='button' onclick="goto2()" <?php if($role != 'TA') {?> disabled="disabled" <?php }?> > click me ya TA </button> 
    <button type='button' onclick="goto3()" <?php if($role != 'DR') {?> disabled="disabled" <?php }?> > click me ya Doctor </button>




<?php }
else{
    echo 'invalid user';
}
?>
<script>
function goto1(){
    window.location.replace("Student.php");
    
}

function goto2(){
    window.location.replace("TA.php");
}

function goto3(){
    window.location.replace("Doctor.php");
}

<?php } ?>
</script>