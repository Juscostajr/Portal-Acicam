<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 14/12/2016
 * Time: 21:19
 */
require_once "./app/model/Postagem.php";
require_once "./app/frameworks/strings.php";
require_once "./app/model/Slider.php";
require_once "./app/model/Local.php";
require_once "./app/frameworks/mensagens.php";

class Noticia
{

    private $postagem;

    /**
     * Noticia constructor.
     */
    public function __construct()
    {
        $this->postagem = new Postagem();
        $this->postagem->exec("SET lc_time_names = 'pt_BR'");
    }

    public function index($id){
        $postagem = new Postagem();
        $local = new Local();

        $value= $postagem->find($id);
        $evento = $local->findLocalFromPostagem($id);
        include_once './view/noticia.php';
    }

    public function ajax($alturaDiv){
        $quantidade = ceil(($alturaDiv - 156) / 72);
        echo $this->show($quantidade);
    }

    public function show($val,$offset = 0){
        $postagem = $this->postagem->findPostagem($val,$offset);
        include_once './view/templates/vejatambem.php';
    }

    public function showPrincipais($val){
        $postagem = $this->postagem->findPostagem($val);
        include_once './view/templates/noticias.php';
}
    public function showSlider(){
        $slider = new Slider();
        $slider = $slider->findLast('ID_Slider',10);
        include_once './view/templates/slider.php';
    }

    public function head($val){
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $postagem = $this->postagem->find($val);
        ob_start();
        include( './view/headers/noticia.php' );
        return ob_get_clean();
    }
}