<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 18/10/2016
 * Time: 16:05
 */
require_once "./app/model/comercio.php";


Class Comercio
{

    function __construct()
    {

    }

    function show($val){
        $comercio = new ComercioModel();
        $comercio = $comercio->findComercio();
        if ($comercio) {
            include_once './view/templates/comercio.php';
        }

    }

}
