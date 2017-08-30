<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 20/09/2016
 * Time: 11:15
 */
require_once './app/model/controlers.php';
require_once "./app/model/CapacitandoNetModel.php";

class CapacitandoNet implements Controlers {

    private $dataList;
    private $size;
    private $imgElement;
    private $linkElement;
    private $cargaHorariaElement;
    private $valorElement;

    public function __construct() {
        $html = mb_convert_encoding(file_get_contents('http://www.portaleducacao.com.br/parceiro/acicam#!1'), 'iso-8859-1');
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);

        $dom->loadHTML($html);
        $cursos = $dom->getElementById("divCursos");
        $this->size = $cursos->getElementsByTagName("img")->length;
        $this->imgElement = $cursos->getElementsByTagName("img");
        $this->linkElement = $cursos->getElementsByTagName("a");
        $this->cargaHorariaElement = $cursos->getElementsByTagName("b");
        $this->valorElement = $cursos->getElementsByTagName("strong");
    }

    public function index() {
      
    }
    public function show() {
          $read = $this->read();
        include_once './view/templates/cursos.php';
    }

    /**
     * @return int
     */
    public function getSize() {
        return $this->size;
    }

    public function read() {
        $pares = 0;
        $impares = 1;

        foreach ($this->imgElement as $key => $value){
            $instancia = new CapacitandoNetModel();
            $instancia->setCarga($this->cargaHorariaElement->item($key)->textContent);
            $instancia->setTitulo($this->valorElement->item($pares)->textContent);
            $instancia->setImagem($this->imgElement->item($key)->getAttribute('src') . PHP_EOL);
            $instancia->setLink($this->linkElement->item($key)->getAttribute('href') . PHP_EOL);
            $instancia->setValor($this->valorElement->item($impares)->textContent);
            $pares += 2;
            $impares += 2;
            $this->dataList[] = $instancia;
        }

        return $this->dataList;
    }

}
