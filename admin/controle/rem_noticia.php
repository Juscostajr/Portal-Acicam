<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 10/05/2016
 * Time: 08:36
 */
if(isset($_POST["id"])){
    require_once "../app/model/Postagem.php";
    require_once "../app/frameworks/mensagens.php";
    require_once "../app/model/Agenda.php";
    $postagem = new Postagem();
    $agenda = new Agenda();
    $id = $_POST["id"];
    try {
        $postagem->delete($id);
        echo alert(GREEN,"Postagem removida com <b>Sucesso!</b>");
    } catch (PDOException $e){
        try {
            $agenda->deleteAltCol("Postagem_ID_Postagem",$id);
            $postagem->delete($id);
            echo alert(GREEN,"Postagem removida com <b>Sucesso!</b>");
            echo alert(YELLOW,"Foi necessária a remoção de itens da agenda");
        }
        catch (PDOException $e){
            echo alert(RED,"<b>Falha</b> ao tentar remover postagem<hr>$e");
        }
    }
}
