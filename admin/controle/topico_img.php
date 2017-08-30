<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 26/01/2017
 * Time: 22:28
 */


require_once "../class/WideImage.php";

if (!empty($_FILES["file"])){


    $y = $_POST['y'];
    $x = $_POST['x'];
    $w = $_POST['w'];
    $h = $_POST['h'];


//    try {
//        WideImage::loadFromUpload("file")->crop($x,$y,$w,$h)->resize(360,500,'fill')->saveToFile(filter_input(INPUT_POST, 'name'),60);
//        $response_array['status'] = 'success'; 
//    } catch (Exception $e) {
//        $response_array['status'] = 'error'; 
//    }
    
    
    
    echo json_encode([status=> var_dump($_FILES["file"])]);
}