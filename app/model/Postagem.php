<?php
require_once "Crud.Class.php";
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 08/09/2016
 * Time: 11:07
 */
class Postagem extends Crud {

    protected $table = "postagem";
    protected $key = "ID_Postagem";

    private $id;
    private $titulo;
    private $conteudo;
    private $imagem;
    private $keywords;
    private $tipo;

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

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


    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }




    public function insert(){
        $sql = "INSERT INTO $this->table (DS_Titulo,Conteudo,Img_Postagem) VALUES (:titulo,:conteudo,:imagem)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":conteudo", $this->conteudo);
        $stmt->bindParam(":imagem", $this->imagem);
        return $stmt->execute();
    }



    public function update($id)
    {
        $sql = "UPDATE $this->table SET DS_Titulo = :titulo,Conteudo = :conteudo WHERE $this->key = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":conteudo", $this->conteudo);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function updateTipo($id)
    {
        $sql = "UPDATE $this->table SET IN_Tipo = :tipo WHERE $this->key = $id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":tipo", $this->tipo);
        return $stmt->execute();
    }

    function findPostagem($quantidade = 2, $offset = 0){
        $sql = "SELECT *, DATE_FORMAT(DT_Postagem,'%d %b') AS data,  DATE_FORMAT( `DT_Postagem` , '%d/%c/%Y as %H:%i' ) AS DT_Completa FROM $this->table  ORDER BY DT_Postagem DESC LIMIT $quantidade OFFSET $offset";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findPart($word){
        $word = '%' . $word . '%';
        $sql = "SELECT * FROM $this->table WHERE Conteudo LIKE :word ORDER BY DT_Postagem DESC";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":word", $word , PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function formatDatePt($data) {
        date_default_timezone_set('America/Sao_Paulo');
        $data = new DateTime($data);
        return $data->format('d/m/Y');

    }
}