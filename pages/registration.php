<?php

include('../helpers/userLoggedIn.php');

include('../templates/header.php');

session_start();
?>
<?php

if(isset($_SESSION['msg']))
{
    echo $_SESSION['msg'];
}

?>

<form action="../includes/register_action.php" method="POST">

    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password-repeat" placeholder="Password repeat">
    <button type="submit">Sign up</button>
</form>

<?php

include('../templates/footer.php');

?>