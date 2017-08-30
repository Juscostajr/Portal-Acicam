<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 18/10/2016
 * Time: 16:05
 */
require_once "./app/model/Agenda.php";


Class Calendario
{

    function __construct()
    {

    }


    function show($val){
        $agenda = new Agenda();
        
        $agenda = $agenda->findAgenda($val);
        include_once './view/templates/calendario.php';

    }
     
    function hoje($data, $dia, $mes)
    {
        $hoje = date("dm");
        if ($hoje == $data) {
            return array("!", "Hoje");
        } else {
            return array($dia, $mes);
        }
    }
}
