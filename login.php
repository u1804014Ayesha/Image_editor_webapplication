<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "image_editor");

if (!$conn) {
    echo "Connection Failed";
}
$msg = "";

if (isset($_POST['submit'])) {
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   // $fname=mysqli_real_escape_string($conn, $_POST['fname']);
    //$lname=mysqli_real_escape_string($conn, $_POST['lname']);

    $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_query($conn, $sql);
    
 
    if (mysqli_num_rows($result) === 1) {
       
       // $row = mysqli_fetch_assoc($result);
       $_SESSION['email']=$email;
       $_SESSION['islogged']=true;
            header("Location: indexafter.php");
        
       
    } else {
        $msg = "<div class='alert alert-danger' style='color:yellow;text-align: center'>     Email or password do not match.</div>";
    }
 
}





?><!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Login</title>
    <style>
        .ayesha4{
    text-align: center;
    color:#750904 ;
    font-size: 15px;
     margin-top: 8px;
    margin-left: 9px;
    font-weight: bold;
}
.ayesha4{
    text-align: center;
    color:#750904 ;
    font-size: 15px;
    . margin-top: 8px;
    margin-left: 9px;
    font-weight: bold;
}
body
{
    background-image: url(sign.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center center;
    font-family:'Times New Roman', Times, serif;
}
.ayesha12{
    font-size: larger;
    color:#AED6F1;
}
.ayesha1{
    position: absolute;
    top: 50%;
    left: 50%;
   transform: translate(-50%,-50%);
   background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3));
    width: 360px;
    height: 550px;
   border-radius: 10px;
    box-shadow: 7px 7px 10px #000;
}
.login_box{
    position: absolute;
    top: 50%;
    left: 50%;
   transform: translate(-50%,-50%);
   background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3));
    width: 360px;
    height: 300px;
    border-radius: 10px;
    box-shadow: 7px 7px 10px #000;

}

h1{
   text-align: center;
   padding-top: 2px;
   color: white;
}

h4{
    text-align: center;
    color: white;
}

form{
    width: 300px;
    margin-left: 20px;
}
form label{
   display:flex;
   margin-top: 20px;
   font-size: 15px;
   color: white;
}

form input{
    width: 100%;
    padding: 7px;
    border: 1px solid gray;
    border-radius: 6px;
    outline: none;
}

input[type="submit"]{
    width: 315px;
    height: 35px;
    margin-top: 20px;
    border: none;
    background-color:#5b24d1;
    color: white;
    font-size: 16px;
}

.para2{
    text-align: center;
    color: white;
    font-size: 15px;
    margin-top: 8px;
}
.para2 a{
    color: #AED6F1 ;
}
.ay13
{
    font-weight: bolder;
    text-align: center;
    color: #aace27 ;
    font-style: italic;
    font-family: 'Times New Roman', Times, serif;
    font-size: large ;
}
.ayesha2
{
    background-color: black;
    color: white;
    font-size: 18px;
    border-radius: 5px;
    margin-top: 12px;
    margin-left: 45px;
    height: 30px;
    width:209px;
}
.ayesha3{
    text-align: center;
    color: white;
    font-size: 15px;
    margin-top: 8px;
}

.ayesha5{
    position: absolute;
    top: 50%;
    left: 50%;
   transform: translate(-50%,-50%);
   background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3));
    width: 360px;
    height: 350px;
   border-radius: 10px;
    box-shadow: 7px 7px 10px #000;
}
    </style>
</head>
<body>
<div class="container">
    <div class="ayesha5">  <h1> Login</h1>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                        <label>Email *</label>  <input type="email" class="email" name="email" placeholder=" " required>
                        <label>Password *</label>  <input type="password" class="password" name="password" placeholder=" " style="margin-bottom: 2px;" required>
                           
                            <!--  /* eta nie pore bhabbo
                            <p><a href="forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                          */-->
                            <button name="submit" name="submit"class="ayesha2" class="btn" type="submit">Submit</button>
                        </form>
                        <div class="social-icons">
                            <p class="ayesha3">Not have an account ?<a href="signup.php"class="ayesha4">Sign Up here</a>.</p>
                        </div>
                    </div>
        </div>
                    </div>
</div>
</body>
</html>