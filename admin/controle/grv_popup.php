<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 07/09/2017
 * Time: 21:16
 */
if(isset($_POST['titulo'])){
    require_once '../app/model/Popup.php';
    require_once "../app/frameworks/mensagens.php";
    require_once "class/WideImage.php";
try {

    $popup = new Popup('../app/data/popup.json');
    $buttons = array();

    foreach ($_POST['texto'] as $key => $value){
        if(empty($value)){break;}
        array_push($buttons,['color' => $_POST['cor'][$key],'text' => $_POST['texto'][$key], 'link' => $_POST['link'][$key]]);
    }

    if(file_exists($_FILES['foto']['tmp_name']) && is_uploaded_file($_FILES['foto']['tmp_name'])){
        $name = $_FILES['foto']['name'];
        WideImage::loadFromUpload("foto")->saveToFile("../img/popups/$name");
        $popup->setImage($name);
    } else {
        $popup->setImage($_POST['oldfoto']);
    }

    $popup->setActive(false);
    $popup->setTitle($_POST['titulo']);
    $popup->setButtons($buttons);


    $popup->save();

    echo alert(GREEN, 'Popup atualizado com sucesso!');
} catch (Exception $e){
    echo alert(RED, 'Falha ao tentar salvar popup! :' . $e);
}
}