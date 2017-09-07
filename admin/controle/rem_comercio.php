<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 10/05/2016
 * Time: 08:36
 */
if(isset($_POST['data']['id'])){
    require_once "../../app/model/comercio.php";

    $comercio= new ComercioModel();
    $id = $_POST['data']['id'];
    try {
        $comercio->delete($id);
        http_response_code(200);
        echo json_encode(['sucesso']);
    } catch (PDOException $e){
        http_response_code(500);
        echo json_encode(['falha' => $e]);
    }
}