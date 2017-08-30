<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 18/12/2016
 * Time: 11:15
 */

require_once 'Crud.Class.php';

class PaginaModel extends Crud
{

    protected $table = "pagina";
    protected $key = "DS_URL";

    private $id;
    private $titulo;
    private $conteudo;
    private $data;
    private $keywords;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * @param mixed $conteudo
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }


    public function insert()
    {
        $sql = 'INSERT INTO' . $this->table . '(DS_Titulo,Conteudo,DT_Modificacao,Keywords) VALUES (:titulo,:conteudo,:data,:keywords)';
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':conteudo', $this->conteudo);
        $stmt->bindParam(':data', $this->data);
        $stmt->bindParam(':keywords', $this->keywords);

        return $stmt->execute();
    }

    public function update($id)
    {
        $sql = 'UPDATE' . $this->table . 'SET DS_Titulo = :titulo,Conteudo = :conteudo ,DT_Modificacao = :data ,Keywords = :keywords WHERE ID_Pagina = :id';
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':id', $this->titulo);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':conteudo', $this->conteudo);
        $stmt->bindParam(':data', $this->data);
        $stmt->bindParam(':keywords', $this->keywords);

        return $stmt->execute();
    }

    public function loadMenu($url)
    {
        $sql = "SELECT * FROM item_menu WHERE DS_Titulo_Pai = (
                  SELECT item_menu.DS_Titulo_Pai FROM pagina
                  INNER JOIN item_menu on pagina.DS_URL = item_menu.Pagina_DS_URL
                  WHERE pagina.DS_URL = '$url')";
        
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findPart($word)
    {
        $word = '%' . $word . '%';
        $sql = "SELECT * FROM $this->table WHERE Conteudo LIKE :word ORDER BY DT_Modificacao DESC";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":word", $word, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }


}