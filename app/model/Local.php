<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 08/09/2016
 * Time: 17:12
 */
require_once "Crud.Class.php";

class Local extends Crud
{
    protected $table = "local";
    protected $key = "ID_Local";
    private $id;
    private $nome;
    private $latitude;
    private $longitude;
    private $endereco;
    private $comentario;

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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }





    public function insert()
    {
       $sql = "INSERT INTO $this->table (NM_Local, Latitude, Longitude, DS_Endereco, DS_Comentario) VALUES (:nome, :latitude, :longitude, :endereco, :comentario);";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":nome",$this->nome);
        $stmt->bindParam(":latitude",$this->latitude);
        $stmt->bindParam(":longitude",$this->longitude);
        $stmt->bindParam(":endereco",$this->endereco);
        $stmt->bindParam(":comentario",$this->comentario);
        return $stmt->execute();
    }

    public function update($id)
    {
        $sql = "UPDATE $this->table SET (NM_Local, Latitude, Longitude, DS_Endereco, DS_Comentario) = (:nome, :latitude, :longitude, :endereco, :comentario) WHERE $this->key = $id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":nome",$this->nome);
        $stmt->bindParam(":latitude",$this->latitude);
        $stmt->bindParam(":longitude",$this->longitude);
        $stmt->bindParam(":endereco",$this->endereco);
        $stmt->bindParam(":comentario",$this->comentario);
    }

    public function findLocalFromPostagem($idPostagem){
        $sql = "SELECT local.*, agenda.* FROM postagem inner join agenda on agenda.Postagem_ID_Postagem = postagem.ID_Postagem inner join local on local.ID_Local = agenda.IN_Local WHERE ID_Postagem = $idPostagem";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":id", $idPostagem, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

}