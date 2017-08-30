<?php

require_once "./app/model/controlers.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Boleto
 *
 * @author usuario
 */
class Boleto implements Controlers{
    //put your code here
    public function index() {
        include_once './view/boleto.php';
        
    }

}
