<?php
session_start();

include('../helpers/userLoggedIn.php');

include('../templates/header.php');
?>

<form action="../includes/login_action.php" method="POST">
<?php
    if(isset($_SESSION['msg']))
    {
        echo $_SESSION['msg'];
    }
?>
<br>

    <input type="email" name="email" id="email" placeholder="email" value="<?= isset($email) ? $email : ""; ?>">
    <input type="password" name="password" id="password" placeholder="password">
    <button type="submit">Login</button>
</form>

<a href="../pages/registration.php">Or create an account?</a>

<?php
include('../templates/footer.php');
?>