<?php
 
session_start();
$conn=mysqli_connect("localhost","root","","image_editor");
 
  

 $email=$_SESSION['email'];
$sql = "SELECT * FROM users WHERE email='{$email}'";
$result = mysqli_query($conn, $sql);
 
$idq2=mysqli_fetch_assoc($result);
    
         
    $a= $idq2['fname'];
    $b=$idq2['lname'];
    

?>