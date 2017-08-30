<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 24/01/2017
 * Time: 17:03
 */

require_once "Crud.Class.php";
class Menu extends Crud
{
    protected $table = 'item_menu';
    protected $key = 'DS_Titulo';
    private $titulo;
    private $pai;
    private $url;

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
    public function getPai()
    {
        return $this->pai;
    }

    /**
     * @param mixed $pai
     */
    public function setPai($pai)
    {
        $this->pai = $pai;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }


    public function findMainMenu(){
        $sql = "SELECT * FROM item_menu WHERE DS_Titulo_Pai IS NULL AND Pagina_DS_URL IS NULL";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function findChildMenu($father){

            $sql = "SELECT * FROM item_menu WHERE DS_Titulo_Pai = '$father'";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
    }


    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }
}