<?php
include 'template.php';

function content(){ ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >

  email <input type="text" name="email" />
  <br/>
  password <input type ="password" name="password"/>
  <br/>
  <input type="submit" />
  

</form>

<?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      if($_POST['email'] != null && $_POST['password'] != null){

        $email = $_POST['email'];
        $pass = md5($_POST['password']);

        $query2 = " SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass' ";
        $result = mysqli_query($GLOBALS['connection'], $query2);
        $arr = mysqli_fetch_assoc($result);
        echo $pass;

        if($arr != null){

          $token['uid'] = $arr['id'];
          try{
            $jwt = JWT::encode($token, $GLOBALS['key']);
          }
          catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
          }
 
          $_SESSION['token'] = $jwt;

          header('location: Gradeshandle.php');
          
        }
        else{
          
          echo "failed";
        }
      }
      else{
        echo "email or password field are empty";
      }
    }
  }

?>