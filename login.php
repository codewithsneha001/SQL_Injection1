<?php
require_once('config.php');
session_start();
if(isset($_SESSION['name']))
{
    header("location:home.php");
}
if(!empty($_POST))
{
    $x = $_POST['name'];
    $y = $_POST['password'];

    // $x = mysqli_real_escape_string($al, $_POST['name']);
    // $y = mysqli_real_escape_string($al, $_POST['password']);
    $sql = mysqli_query($al, "select * from users where name= '".$x."' and password='".$y."'");
    if(mysqli_num_rows($sql)==1)
    {
        $_SESSION['name'] = $_POST['name'];
        header("location:home.php");
    }
    else
    {
        $msg = "Incorrect Credentials";
    }
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>User Login</title>
    </head>
    <body>
        <div align="center">
            <br>
            <br>
            <h1>SQL Injection Demo
                <br>
            </h1>
            <h1>User Login</h1>
            <br>
            <h3><?php if(isset($msg)) {echo $msg;}?></h3>
            <br>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="name" name="name" size="25" required title="Enter name" placeholder="Enter name"/>
                <br>
                <br>
                <input type="password" name="password" size="25" required title="Enter Password" placeholder="Enter Password"/>
                <br>
                <br>
                <input type="submit" value="Login"/>
            </form>
        </div>
    </body>
</html>