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
     
    //just for testing; dont forget to remove it
    var_dump($decoded_tok);

    }
    catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    ?>








<?php } ?>