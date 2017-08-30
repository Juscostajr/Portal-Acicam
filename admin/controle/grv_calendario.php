<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 20/05/2016
 * Time: 16:35
 */
require_once "../app/model/Agenda.php";
require_once "../app/model/Postagem.php";
require_once "../app/frameworks/mensagens.php";
$agenda = new Agenda();
$postagem = new Postagem();
if(isset($_POST["evento"])){
    $tempo = $_POST["data"] . " " . $_POST["hora"];
    $link = $_POST["forma"] == "1";
    $contato = $_POST["forma"] == "2";
    $agenda->setData($tempo);
    $agenda->setDescricao($_POST["evento"]);
    $agenda->setPostagem($_POST["idpostagem"]);
    $agenda->setLocal( $_POST["local"]);
    $agenda->setTermino( isset($_POST["hora-fim"]) ? $_POST["hora-fim"] : false);
    $agenda->setValor( isset($_POST["preco"]) ? $_POST["preco"] : 0);
    $agenda->setContato($contato ? $_POST["ingresso"] : false);
    $agenda->setLink($link ? $_POST["ingresso"] : false);
    $agenda->setLocalRetirada( isset($_POST["local-ingresso"]) ? $_POST["local-ingresso"] : false );
    $postagem->setTipo("1");
    try {
        $agenda->insert();
        $postagem->updateTipo($_POST["idpostagem"]);
        echo alert(GREEN,"Evento gravado com <b>Sucesso!</b>");
    } catch (Exception $e) {
        echo alert(RED,"<b>Falha</b> ao gravar o evento!");
    }
}
