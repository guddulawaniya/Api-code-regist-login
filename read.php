<?php

require 'server_config.php';

function getdatalist(){

    global $conn;

    $query = "SELECT * FROM `new_application_suggestion`";

    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {

        if(mysqli_num_rows($query_run)>0)
        {

            $res = mysqli_fetch_all($query_run,MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Student Record Fetched Successfully',
                'data' => $res
            ];
            header("HTTP/1.0 200 OK ");
            echo json_encode($data);

        }
        else
        {
            $data = [
                'status' => 404,
                'message' => 'No Record Found',
            ];
            header("HTTP/1.0 404 No Record Found ");
            echo json_encode($data);

        }

    }
    else
    {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error ");
        echo json_encode($data);
    }

}
?>