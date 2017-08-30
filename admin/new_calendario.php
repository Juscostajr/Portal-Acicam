<script>
    function dispensado(){
        document.getElementById("ingresso").disabled=true;
        document.getElementById("local-ingresso").disabled=true;
        document.getElementById("gratis").disabled=true;
        document.getElementById("chk-gratis").checked=true;
        document.getElementById("chk-gratis").disabled=true;
    }
    function escolha(opt){
        var ingresso = document.getElementById("ingresso");
        var local = document.getElementById("local-ingresso");
        document.getElementById("chk-gratis").disabled=false;
        ingresso.disabled=false;
        local.disabled=true;
        switch (opt) {
            case "0":
                ingresso.placeholder = "";
                dispensado();
                break;
            case "1":
                ingresso.placeholder = "Informe o link da inscrição";
                break;
            case "2":
                ingresso.placeholder = "Informe o contato para reservas";
                break;
            case "3":
                local.disabled=false;
                ingresso.disabled=true;
                break;
            default:
                disableAll();

        }
    }
</script>

<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 20/05/2016
 * Time: 14:24
 */

require_once "controle/grv_calendario.php";

function __autoload($className){
    require_once "../app/model/" . $className . ".php";
}

$local = new Local();
$postagem = new Postagem(); ?>



<div id="consulta" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Consulta</h4>
            </div>
            <div class="modal-body">

                <div class="list-group" style="height: 60vh; overflow: auto">
                    <?php foreach ($postagem->findLast("DT_Postagem",20) as $key => $value): ?>
                        <a onclick="selecionar(this,'<?php echo $value->ID_Postagem ?>')" class="list-group-item"><?php echo $value->DS_Titulo ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer form-inline">
                <input type="text" class="form-control" name="lname" id="nid" value="" disabled>
                <button type="button" onClick="passarDados()" class="btn btn-default" data-dismiss="modal">Inserir</button>
            </div>
        </div>
    </div>
</div>
<br>
Data/Hora/Local

<form method="post" role="form" action="">
    <div class="form-group">
        <div class="form-inline">

            <input class="form-control" type="date" name="data">
            <input class="form-control" type="time" name="hora">
            <div class="checkbox">
                <label><input type="checkbox" onClick="if(this.checked){ document.getElementById('hora-fim').disabled = false;} else {document.getElementById('hora-fim').disabled = true;}"> as </label>
            </div>
            <input class="form-control" type="time" name="hora-fim" id="hora-fim" disabled="true">
            <select class="form-control" name="local">
                <option value="0">Selecione um Local</option>
                <?php foreach ($local->findAll() as $key => $value): ?>
                    <option value='<?php echo $value->ID_Local ?>'><?php echo $value->NM_Local ?></option>
                <?php endforeach ?>
            </select>
            <button class="btn btn-success" type="button" onclick="window.location='./?pg=local&aba=nova'"><span class="glyphicon glyphicon-plus"></span> Novo Local</button>
        </div>
    </div>
    Título
    <div class="form-group">
        <input type="text" class="form-control" name="evento">
    </div>
    Ingressos
    <div class="form-group">
        <select class="form-control" name="forma" onChange="escolha(this.value)">

            <option value="0">Dispensado - Não será necessária a compra, reserva ou apresentação de ingressos</option>
            <option value="1">Link - Será mostrado um link para inscrições online</option>
            <option value="2">Contato - Será informado um contato para a reserva de ingressos</option>
            <option value="3">Local - Será informado um local para a compra de ingressos</option>
        </select>
    </div>


    Valor<br>
    <label><input type="checkbox" id="chk-gratis" onClick="var gratis = document.getElementById('gratis');if(this.checked){ gratis.disabled = true; gratis.value = '0'; } else {gratis.disabled = false; gratis.value='';}" checked disabled> Gratuito</label>

    <div class="form-group">
        <div class="form-inline">

            <input class="form-control" type="number" name="preco" id="gratis" placeholder="Valor em Reais" value="0" disabled>
            <input class="form-control" type="text" name="ingresso" placeholder="" id="ingresso" disabled>
            <select class="form-control" name="local-ingresso" id="local-ingresso" disabled>
                <option value="NULL">Selecione um Local</option>
                <?php foreach ($local->findAll() as $key => $value): ?>
                    <option value='<?php echo $value->ID_Local ?>'><?php echo $value->NM_Local ?></option>
                <?php endforeach ?>
            </select>

        </div>
    </div>

    ID da Postagem
    <div class="form-group">
        <div class="input-group">
            <input type="text" id="postagem" name="idpostagem" placeholder="Pesquisar" class="form-control">
            <span class="input-group-btn">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#consulta"><span class="glyphicon glyphicon-search"></span> </button>
            </span>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success btn-block">
    </div>
</form>



