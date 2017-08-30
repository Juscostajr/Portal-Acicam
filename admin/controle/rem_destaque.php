<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 10/05/2016
 * Time: 08:36
 */
if(isset($_POST["id"])){
    require_once "../app/model/Slider.php";
    require_once "../app/frameworks/mensagens.php";

    $slider= new Slider();
    $id = $_POST["id"];
    try {
        $slider->delete($id);
        echo alert(GREEN,"Destaque removido com <b>Sucesso!</b>");
    } catch (PDOException $e){
        echo alert(RED,"<b>Falha</b> ao tentar remover destaque!");
    }
}