<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 10/05/2016
 * Time: 08:36
 */
if(isset($_POST["file"])){
    $file = '../..' . $_POST["file"];
    if(unlink($file)){
        echo json_encode(['feedback' => 'success']);
        http_response_code(200);
    } else{
        echo json_encode(['feedback' => 'fail']);
        http_response_code(500);
    }
}