<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "image_editor");

if (!$conn) {
    echo "Connection Failed";
}
$msg = "";
if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));


    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'style=\"color:yellow;text-align:center\">{$email} - This email address has been already exists.</div>";
    } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO users (fname,lname, email, password) VALUES ('{$fname}', '{$lname}','{$email}', '{$password}')";
            $result = mysqli_query($conn, $sql);
             
            if ($result) {    
                $_SESSION['logged']=true;
                $_SESSION['user_name']=$fname;
                $_SESSION['last_name']=$lname;
                $msg = "Account Verification Complete";
                header("Location: login.php");
            } else {
                $_SESSION['logged']=true;
                $msg = "Something went wrong";
            }
        } else {
            $msg = "<div class='alert alert-danger' style='color:yellow;text-align: center'> Password and Confirm Password do not match</div>";
          
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Signup</title>
    <style>
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
        <div class="ayesha1">
            <h1> Sign Up</h1>
            <?php echo $msg; ?>
            <form action="" method="post">
            <label>First Name *</label>
             <input type="text" class="fname" name="fname" placeholder=" " value="<?php if (isset($_POST['submit'])) {
                                                                                                                                        echo $fname;
                                                                                                                                    } ?>" required>

            <label>Last Name *</label> <input type="text" class="lname" name="lname" placeholder=" " value="<?php if (isset($_POST['submit'])) {
                                                                                                                                    echo $lname;
                                                                                                                                } ?>" required>
            <label>Email *</label> <input type="email" class="email" name="email" placeholder=" " value="<?php if (isset($_POST['submit'])) {
                                                                                                                            echo $email;
                                                                                                                        } ?>" required>
            <label>Password *</label> <input type="password" class="password" name="password" placeholder=" " required>
            <label>Confirm Password *</label> <input type="password" class="confirm-password" name="confirm-password" placeholder=" " required>
            <button name="submit" class="ayesha2"class="btn" type="submit">Submit</button>
             </form>
         
            <div class="social-icons">
                <p class="ayesha3">Already have an account?<a href="login.php" class="ayesha4" text>Login here</a>.</p>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
