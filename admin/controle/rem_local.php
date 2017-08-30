<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 10/05/2016
 * Time: 08:36
 */
if(isset($_POST["id"])){
    require_once "../app/model/Local.php";
    require_once "../app/frameworks/mensagens.php";

    $local = new Local();
    $id = $_POST["id"];
    try {
        $local->delete($id);
        echo alert(GREEN,"Local removido com <b>Sucesso!</b>");
    } catch (PDOException $e){
        echo alert(RED,"<b>Falha</b> ao tentar remover local!<hr>O intem ao qual deseja excluir está sendo utilizado por outras entidades");
    }
}