<?php

header("Content-Type: application/json");
header("Acess-Control-allow-origin: *");
header("Acess-Control-Allow-Method: GET");
header("Acess-Control-Allow-Method: Content-Type,Access-Control-Headers,Authorization , X-Request-with");


include('read.php');
$requestMethod =  $_SERVER["REQUEST_METHOD"];
if($requestMethod=="GET")
{

    $datalist = getdatalist();
    echo $datalist;

}
else {
    $data = [
        'status' => 405,
        'message' => $requestMethod. 'Method Not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}



?>