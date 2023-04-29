<?php
require_once('config.php');
if(!empty($_POST))
{
    $sql = mysqli_query($al,"insert into users(name,email,password) values('".mysqli_real_escape_string($al,$_POST['name'])."','".mysqli_real_escape_string($al,$_POST['email'])."','".mysqli_real_escape_string($al,$_POST['password'])."')");
    if($sql)
    {
        $msg = "Registered Succesfully";
    }
    else
    {
        $msg = "Error In Registration";
    }
}
?>
<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <div align="center">
            <br>
            <br>
            <h1>Registration Form</h1>
            <br>
            <h3><?php if(isset($msg)) {echo $msg.mysqli_error($al);}?></h3>
            <br>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="text" name="name" size="25" required title="Please Enter Name" placeholder="Enter Full Name"/>
                <br>
                <br>
                <input type="email" name="email" size="25" required title="Enter email" placeholder="Enter Email"/>
                <br>
                <br>
                <input type="password" name="password" size="25" required title="Enter Password" placeholder="Enter Password"/>
                <br>
                <br>
                <input type="submit" value="Register"/>
            </form>
        </div>
    </body>
</html>