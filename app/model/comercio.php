<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 23/01/2017
 * Time: 16:47
 */
require_once "Crud.Class.php";
class ComercioModel extends Crud
{
    public $data;
    public $descricao;
    public $inicio;
    public $termino;
    protected $table = "hr_comercio";
    protected $key = "DT_Comercio";

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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * @param mixed $inicio
     */
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;
    }

    /**
     * @return mixed
     */
    public function getTermino()
    {
        return $this->termino;
    }

    /**
     * @param mixed $termino
     */
    public function setTermino($termino)
    {
        $this->termino = $termino;
    }




    public function insert()
    {
        $sql = "INSERT INTO $this->table (DT_Comercio, DS_Comercio, HR_Inicio, HR_Termino) VALUES (:dt, :ds, :ini, :ter)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':dt',$this->data);
        $stmt->bindParam('ds:',$this->descricao);
        $stmt->bindParam('ini:',$this->inicio);
        $stmt->bindParam('ter:',$this->termino);
        return $stmt->execute();
    }

    public function findComercio (){
        $sql = "SELECT date_format(DT_Comercio, '%b') AS Mes , date_format(DT_Comercio,'%d') AS Dia, date_format(DT_Comercio,'%y') AS Ano,  date_format(HR_Inicio,'%H:%i') AS Inicio, date_format(HR_Termino,'%H:%i') AS Termino  , date_format(DT_Comercio,'%W') AS Semana , DS_Comercio from $this->table";
        $this->exec("SET lc_time_names = 'pt_BR'");
        return $this->findQuery($sql);
    }

    public function update($id)
    {

        $sql = "UPDATE $this->table SET DT_Comercio = :dt , DS_Comercio = :ds WHERE DT_Comercio = :dt";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':dt', $this->data);
        $stmt->bindParam(':ds', $this->descricao);
        return $stmt->execute();
    }
}