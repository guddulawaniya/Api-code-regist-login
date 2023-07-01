<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "students";

$conn = new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection Failed : ".$conn->connect_error);

}
$USER_ID = $_POST['user_id'];
$PROGRAME = $_POST['program'];
$INSTITUDE = $_POST['institution'];
$CAMPUS = $_POST['campus'];
$INTAKE = $_POST['intake'];
$COMPLETE_YEAR = $_POST['year'];
$COURSE_NAME = $_POST['course'];
$REMARKS_TEXT = $_POST['remark_text'];


$query = "INSERT INTO `new_application_requests` (`user_id`, `programme`, `institution`, `campus`, `intake`, `year`, `course`, `Remarks_text`)
 VALUES ('$USER_ID', '$PROGRAME', '$INSTITUDE', '$CAMPUS', '$INTAKE', '$COMPLETE_YEAR', '$COURSE_NAME', '$REMARKS_TEXT');";


$result = $conn->query($query);

if($result==1)
{
    $response = array("status"=>"1","Message"=>  "Successfully Inserted Request ");
}
else { 
    $response = array("status"=>"0","Message"=>  "Not Inserted Request");
}

 echo json_encode($response);


?>