<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "students";

$conn = new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection Failed : ".$conn->connect_error);

}

$EMAIL = $_POST['email'];
$PASS = $_POST['password'];



$sql = "SELECT * FROM registration where Email = '$EMAIL'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);


if($count == 1){  
    echo " Login successful";  
}  
else{  
    echo " Login failed. Invalid Email";  
}     


?>