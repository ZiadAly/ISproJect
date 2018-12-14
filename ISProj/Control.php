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
if ($role == 'Student'){ ?>
    <h4> Welcome, Click below to enter your page.</h4> 
    <button type='button' onclick="goto1()"> click me ya Student </button>
<?php }
elseif ($role == 'TA') { ?>
    <h4> Welcome, Click below to enter your page.</h4> 
    <button type='button' onclick="goto2()"> click me ya TA </button>
<?php } 
elseif ($role == 'DR'){ ?> 
    <h4> Welcome, Click below to enter your page.</h4>   
    <button type='button' onclick="goto3()"> click me ya Doctor </button>
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