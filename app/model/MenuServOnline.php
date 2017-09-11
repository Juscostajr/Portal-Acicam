<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 16/12/2016
 * Time: 08:32
 */
class MenuServOnline
{

    private $titulo;
    private $link;
    private $imagem;


    public function read($url = './app/data/servicosOnline.json'){
        $json = file_get_contents($url);
        $jsonObj = json_decode($json);
        return $jsonObj->itens;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }
    


}