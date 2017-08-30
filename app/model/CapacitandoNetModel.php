<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 19/09/2016
 * Time: 23:20
 */


class CapacitandoNetModel
{

    private $link;
    private $imagem;
    private $titulo;
    private $valor;
    private $carga;

    /**
     * @return mixed
     */
    public function getLink()
    {
        return 'http://www.portaleducacao.com.br/' . $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getCarga()
    {
        return $this->carga;
    }

    /**
     * @param mixed $carga
     */
    public function setCarga($carga)
    {
        $this->carga = $carga;
    }






}