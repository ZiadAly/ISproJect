
<?PHP
require_once "formvalidator.php";
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

        echo "<h2>Validation Success!</h2>";

        $show_form=false;

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

<form name='test' method='POST' action='SignUp.php' accept-charset='UTF-8'>

Name: <input type='text' name='Name' size='20'>

Email: <input type='text' name='Email' size='20'>

Password: <input type='Password' name='Password' size='20'>

Role: <input type='text' name='Role' size='20'>


<input type='submit' name='Submit' value='Submit'>

</form>

<?PHP

}//true == $show_form

?>
