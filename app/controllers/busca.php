<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 19/12/2016
 * Time: 14:54
 */

require_once './app/model/pagina.php';
require_once './app/model/Postagem.php';

class Busca
{
    public function index($busca = false)
    {



        if(isset($_POST['pesquisa'])){
            $busca = $_POST['pesquisa'];
        }


        if (!$busca || (strlen($busca) <= 2)) {
            include_once './view/novaBusca.html';

        }
        else {
            $pagina = new PaginaModel();
            $postagem = new Postagem();
            $postagens = $postagem->findPart($busca);
            $pagina = $pagina->findPart($busca);
            include_once './view/busca.php';
        }




    }
}