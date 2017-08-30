<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 09/09/2016
 * Time: 09:41
 */

require_once "Crud.Class.php";
class Slider extends Crud
{
    protected $table = "slider";
    protected $key = "ID_Slider";
    private $id;
    private $postagem;
    private $titulo;
    private $subtitulo;
    private $imagem;

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
    public function getPostagem()
    {
        return $this->postagem;
    }

    /**
     * @param mixed $postagem
     */
    public function setPostagem($postagem)
    {
        $this->postagem = $postagem;
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
    public function getSubtitulo()
    {
        return $this->subtitulo;
    }

    /**
     * @param mixed $subtitulo
     */
    public function setSubtitulo($subtitulo)
    {
        $this->subtitulo = $subtitulo;
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



    public function insert()
    {
        $sql = "INSERT INTO $this->table VALUES (NULL,:postagem,:titulo,:subtitulo,:imagem)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":postagem",$this->postagem,PDO::PARAM_INT);
        $stmt->bindParam(":titulo",$this->titulo);
        $stmt->bindParam(":subtitulo",$this->subtitulo);
        $stmt->bindParam(":imagem",$this->imagem);
        return $stmt->execute();
    }

    public function update($id)
    {
        $sql = "UPDATE $this->table SET Postagem_ID_Postagem = :idPostagem, DS_Titulo = :titulo, DS_Subtitulo = :subtitulo WHERE ID_Slider = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":idPostagem",$this->postagem,PDO::PARAM_INT);
        $stmt->bindParam(":titulo",$this->titulo);
        $stmt->bindParam(":subtitulo",$this->subtitulo);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        return $stmt->execute();
    }
}