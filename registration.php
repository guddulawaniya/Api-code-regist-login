<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "students";

$conn = new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection Failed : ".$conn->connect_error);

}
$FIRST_NAME = $_POST['first_name'];
$LAST_NAME = $_POST['last_name'];
$MOBILE_NO = $_POST['mobile_number'];
$EMAIL_ID = $_POST['email_id'];
$DOB = $_POST['dob'];
$COUNTRY = $_POST['country'];
$STATE = $_POST['state'];
$CITY = $_POST['city'];
$GENDER = $_POST['gender'];
$REFERRAL_CODE = $_POST['referral_code'];


$query = "INSERT INTO `registration` (`firstname`, `Lastname`, `Mobilenumber`, `Email`, `Date_of_birth`, `Country`, `States`, `City`, `Gender`, `Referral_code`)
 VALUES ('$FIRST_NAME', '$LAST_NAME', '$MOBILE_NO', '$EMAIL_ID', '$DOB', '$COUNTRY', '$STATE', '$CITY', '$GENDER', '$REFERRAL_CODE');";

// $query = "INSERT INTO `registration` (`firstname`, `Lastname`, `Mobilenumber`, `Email`, `Date_of_birth`, `Country`, `States`, `City`, `Gender`, `Referral_code`) 
// VALUES ($FIRST_NAME, $LAST_NAME,$MOBILE_NO, $EMAIL_ID, $DOB, $COUNTRY, $STATE, $CITY, $GENDER, $REFERRAL_CODE);";

// $query = "INSERT INTO registraion_table () 
// VALUES ()";

$result = $conn->query($query);

if($result==1)
{
    $response = array("status"=>"1","Message"=>  "Successfully Inserted Data");
}
else { 
    $response = array("status"=>"0","Message"=>  "Not Inserted Data");
}

 echo json_encode($response);


?>