<?php
include 'template.php';

function content(){
    $t = $_SESSION['token'];
    echo $t;
    echo"<hr>";
    $k = $GLOBALS['key'];
    try{
    $decoded_tok =  JWT::decode($t, $k, array('HS256'));
    var_dump($decoded_tok);
    }
    catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
}


?>