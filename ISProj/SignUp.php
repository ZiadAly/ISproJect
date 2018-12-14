
<?PHP
require_once "formvalidator.php";
include 'template.php';
function content(){


$show_form=true;
if(isset($_POST['Submit']))
{
    $validator = new FormValidator();

    $validator->addValidation("Name","req","Please fill in Name");

    $validator->addValidation("Email","email",

"The input for Email should be a valid email value");

    $validator->addValidation("Email","req","Please fill in Email");

    $validator->addValidation("Password","req","Please fill in Password");

    $validator->addValidation("Role","req","Please fill in Role");

    if($validator->ValidateForm())

    {
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $pass = md5($_POST['Password']);
        $role = $_POST['Role'];

        $query = "INSERT INTO `users`(`id`, `name`, `email`, `password`, `role`) 
        VALUES ('','$name','$email','$pass','$role') ";

        $result = mysqli_query($GLOBALS['connection'], $query);

        header('location: login.php');

    }

    else
    {

        echo "<B>Validation Errors:</B>";
        $error_hash = $validator->GetErrors();

        foreach($error_hash as $inpname => $inp_err)

        {

          echo "<p>$inpname : $inp_err</p>\n";
        }
    }
}
if(true == $show_form)
{
?>

<form method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' >

Name: <input type='text' name='Name' size='20'>

Email: <input type='text' name='Email' size='20'>

Password: <input type='Password' name='Password' size='20'>

Role: <input type='text' name='Role' size='20'>


<input type='submit' name='Submit' value='Submit'>

</form>

<?PHP

}

    // if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //     $name = $_POST['Name'];
    //     $email = $_POST['Email'];
    //     $pass = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    //     $role = $_POST['Role'];

    //     $query = "INSERT INTO `users`(`id`, `name`, `email`, `password`, `role`) 
    //     VALUES ('','$name','$email','$pass','$role') ";

    //     $result = mysqli_query($GLOBALS['connection'], $query);

        

    // }
}
?>
