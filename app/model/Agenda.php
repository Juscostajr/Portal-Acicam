<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 08/09/2016
 * Time: 10:21
 */

require_once "Crud.Class.php";


class Agenda extends Crud{
    protected $table = "agenda";
    protected $key = "ID_Agendamento";
    private $id;
    private $postagem;
    private $data;
    private $descricao;
    private $local;
    private $termino;
    private $valor;
    private $contato;
    private $link;
    private $localRetirada;

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
    public function getContato()
    {
        return $this->contato;
    }

    /**
     * @param mixed $contato
     */
    public function setContato($contato)
    {
        $this->contato = $contato;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
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
    public function getLocalRetirada()
    {
        return $this->localRetirada;
    }

    /**
     * @param mixed $localRetirada
     */
    public function setLocalRetirada($localRetirada)
    {
        $this->localRetirada = $localRetirada;
    }

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
     * @return Postagem
     */
    public function getPostagem()
    {
        return $this->postagem;
    }

    /**
     * @param Postagem $postagem
     */
    public function setPostagem($postagem)
    {
        $this->postagem = $postagem;
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
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param mixed $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }


    public function insert(){
        $sql = "INSERT INTO $this->table (Postagem_ID_Postagem,DT_Agendamento,DS_Agendamento,IN_Local,DT_Termino,VL_Ingresso,DS_Contato,DS_Link,IN_Ingressos_Local) VALUES (:postagem,:dat,:descricao,:lcal,:termino,:valor,:contato,:link,:retirada)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":postagem", $this->postagem);
        $stmt->bindParam(":dat", $this->data);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":lcal", $this->local);
        $this->bindNull(":termino",$this->termino,$stmt);
        $this->bindNull(":valor",$this->valor,$stmt);
        $this->bindNull(":contato",$this->contato,$stmt);
        $this->bindNull(":link",$this->link,$stmt);
        $this->bindNull(":retirada",$this->localRetirada,$stmt);
        return $stmt->execute();

    }

    public function update($id)
    {
        $sql = "UPDATE $this->table SET (Postagem_ID_Postagem,DT_Agendamento,DS_Agendamento,IN_Local) = (:postagem,:dat,:descricao,:lcal) WHERE $this->key = $id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":postagem", $this->postagem,PDO::PARAM_INT);
        $stmt->bindParam(":dat", $this->data);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":lcal", $this->local,PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function findAgenda ($limit){
        $sql = "SELECT date_format(DT_Agendamento, '%b') AS Mes , date_format(DT_Agendamento,'%d') AS Dia, date_format(DT_Agendamento,'%d%m') AS DataNumeral,  date_format(DT_Agendamento,'%H:%i') AS Horario,DS_Agendamento, local.NM_Local AS Local, Postagem_ID_Postagem from agenda inner join local on agenda.IN_Local = local.ID_Local ORDER BY DT_Agendamento ASC LIMIT $limit";
        $this->exec("SET lc_time_names = 'pt_BR'");
        return $this->findQuery($sql);
    }

}