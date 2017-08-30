<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 16/12/2016
 * Time: 17:48
 */

require_once './app/model/pagina.php';
class Pagina
{
    public function index($id){

        
        $pagina = new PaginaModel();
        
        //$stmt = $conn->query("SELECT * FROM pagina WHERE ID_Pagina = $id");

        $conteudo = $pagina->find($id);

        include_once './view/pagina.php';



}

}