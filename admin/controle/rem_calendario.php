<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 10/05/2016
 * Time: 08:36
 */
if(isset($_POST["id"])){
require_once "../app/model/Agenda.php";
require_once "../app/frameworks/mensagens.php";

$id = $_POST["id"];
$agenda = new Agenda();
try {
    $agenda->delete($id);
    echo alert(GREEN,"Evento removido com <b>Sucesso!</b>");}
catch (Exception $e){
    echo alert(RED,"<b>Falha</b> ao remover evento!<hr>$e");
}
}