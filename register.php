<html>
<head>
    <title>First Backend porject</title>
</head>
<body>
    <h2>Registration Page</h2>
    <a href="index.php">Click here to go back<br></a>
    <form action="register.php" method="post">
        Enter Username: <input type="text" name="username" required="required" /></br>
        Enter Password: <input type="password" name="password" required="required" /></br>
        <input type="submit" value="Register">
    </form>
</body>
</html>


<?php
    $con = mysqli_connect("localhost", "root", "") or die(mysqli_errno());
    mysqli_select_db($con, "first_db");




   if(isset($_POST['username']) && isset($_POST['password'])){
       $username = $_POST['username'];
       $password = $_POST['password'];

       $query = mysqli_query("SELECT *  FROM users WHERE username = '$username' AND password = '$password' ");
       if(mysql_num_rows($query > 0) or die("The username already exist".mysqli_error())){
           $query = mysqli_query("insert into users values('$username', '$password')");

           if(!$query){
               die("Registration not completed" . mysqli_errno());
           }
           echo "Registration successfully done!";
       }

   }
?>