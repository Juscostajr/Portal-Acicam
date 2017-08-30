<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 10/05/2016
 * Time: 08:36
 */
if(isset($_POST["id"])){
    require_once "../app/model/pagina.php";
    require_once "../app/frameworks/mensagens.php";

    $pagina= new PaginaModel();
    $id = $_POST["id"];
    try {
        $pagina->delete($id);
        echo alert(GREEN,"Destaque removido com <b>Sucesso!</b>");
    } catch (PDOException $e){
        echo alert(RED,"<b>Falha</b> ao tentar remover destaque!");
    }
}