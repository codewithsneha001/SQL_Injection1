<?php
require_once('config.php');
session_start();
if(!isset($_SESSION['name']))
{
    header("location:login.php");
}
$pr = mysqli_fetch_array(mysqli_query($al, "select * from users where name='" . $_SESSION['name'] . "'"));
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
    </head>
    <body>
        <h1>Welcome <?php echo $pr['name'];?><br></h1>
        <h2>Login Successfull</h2>
        <br>
        <a href="logout.php">Logout</a>
    </body>
</html>