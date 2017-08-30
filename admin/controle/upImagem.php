<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 20/05/2016
 * Time: 16:35
 */
require_once "../class/WideImage.php";
require_once "../../app/frameworks/mensagens.php";


if (!empty($_FILES["file"])){ 
  try {
    $imagem = $_FILES['file']['name'];
    WideImage::loadFromUpload("file")->resize(263,365,'outside')->crop("center", "middle", 263, 365)->saveToFile("../../img/slider/$imagem",80);
    echo json_encode([]);
  } catch (Exception $e) {
    echo json_encode(["error" => "erro"]);
  }
}