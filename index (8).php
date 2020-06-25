<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset = "utf-8">
        <link rel = "stylesheet" href ="style.css">
    <body>
        <h1 class = "login"> LOGIN </h1>
        <form class = "loginbox" action="index.php" method="POST">
            email: <input class = "textbox" type="text" placeholder = "email" name="email"><br>
            password: <input class = "textbox" type="password" placeholder = "password" name="password"><br>
            <input class = "btn" type="submit" name = "button" value = "Login">
        </form>
    </body>

    <?php
    //Include DAL
    include('DAL.php');
    $name =  $_POST["name"];
    $email =  $_POST["email"];

    $sql = "SELECT email, password FROM users WHERE email = '$email' AND password = '$password'";
    echo $sql;

    if (!mysqli_query($conn,$sql)) 
    {
        echo 'not inserted';
    }
    else 
    {
       echo'inserted';
    }
    if($count == 1) 
    {
        header("location: welcome.php");
     }
     else {
        $error = "Your Login Name or Password is invalid";
     }
    
 ?>

</HTML>
    