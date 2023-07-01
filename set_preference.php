<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "students";

$conn = new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection Failed : ".$conn->connect_error);

}
$USERID = $_POST['userid'];
$COUNTRY = $_POST['country'];
$INTEREST = $_POST['interest'];
$COURSE_NAME_QUALIFICATION  = $_POST['qualification'];
$PERCENTAGE = $_POST['percentage'];
$ENGLISH_COURSE_NAME = $_POST['english_score'];
$READING = $_POST['reading'];
$WRITING = $_POST['writing'];
$LISTENING = $_POST['listening'];
$SPEAKING = $_POST['speaking'];
$OVERALL = $_POST['overall'];
$SET_PIN = $_POST['login_pin'];


$query = "INSERT INTO `set_preference` (`user_id`, `Country`, `interest_Area`, `course_name_qulification`, `Percentage`, `english_course_name`, `Reading_score`, `writing_score`, `listening_score`, `speaking_score`, `overall_score`, `set_password`)
 VALUES ('$USERID', '$COUNTRY', '$INTEREST', '$COURSE_NAME_QUALIFICATION', '$PERCENTAGE', '$ENGLISH_COURSE_NAME', '$READING', '$WRITING', '$LISTENING', '$SPEAKING', '$OVERALL', '$SET_PIN');";

$result = $conn->query($query);

if($result==1)
{
    $response = array("status"=>"1","Message"=>  "Successfully Set Preference");
}
else { 
    $response = array("status"=>"0","Message"=>  "Not set preference Data");
}

 echo json_encode($response);


?>