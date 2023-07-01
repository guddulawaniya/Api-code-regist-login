<?php
header("Content-Type: application/json");
header("Acess-Control-allow-origin: *");
header("Acess-Control-Allow-Method: POST");

include 'server_config.php';
$data  = json_decode(file_get_contents("php://input"),true);



$filename = $_FILES['sendimage']['name'];
$tempPath = $_FILES['sendimage']['tmp_name'];
$filesize = $_FILES['sendimage']['size'];

if(empty{$filename})
{
    $errorMSG = json_encode{array{"message"=>"please select image ","status"=>false}};
}
else
{
    $upload_path = 'upload/';

    $fileExt = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $valid_extension = array['jpeg','jpg','png','pdf'];

    if(in_array($fileExt,$valid_extension))
    {
        if(!file_exists($upload_path.$filename))
        {
            if($filesize<5000000)
            {
                move_uploaded_file($tempPath,$upload_path.$filename);
            }
            else
            {
                $errorMSG = json_encode(array("message"=>"Sorry your file is to large please upload 5 MB size","status"=> false));
                echo $errorMSG;
            }

        }else
        {
            $errorMSG = json_encode(array("message"=> "Sorry,file already exists check upload folder","status"=>false));
            echo $errorMSG;

        }
    }
    else{
        $errorMSG = json_encode(array("message"=> "Sorry,only JPG,JPEG,PNG & PDF files are allowed ","status"=>false));
        echo $errorMSG;
    }

}

if(!isset($errorMSG))
{
    $query = mysqli_query($conn,'INSERT INTO documents (name) values ("'.$filename.'") ');
    echo json_encode(array("message"=> "Image uploaded Sucessfully","status"=> true));
}

?>