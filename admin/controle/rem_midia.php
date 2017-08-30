<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 10/05/2016
 * Time: 08:36
 */
if(isset($_POST["file"])){
    require_once "../app/frameworks/mensagens.php";
    $file = $_POST["file"];
    if(unlink($file)){
        echo alert(GREEN,"Arquivo removido com <b>Sucesso!</b>");
    } else{
        echo alert(RED,"<b>Falha</b> ao tentar remover arquivo!");
    }
}