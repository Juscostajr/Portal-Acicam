<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 15:33
 */

//require_once "controle/rem_comercio.php";
require_once "../app/model/comercio.php";
require_once "class/Pagger.php";
require_once "../app/frameworks/strings.php";
$pagger = new Pagger('./?pg=calendario&aba=editar');
$comercio = new ComercioModel();
?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Data</th>
            <th>Descrição</th>
            <th>Hora de Início</th>
            <th>Hora de Término</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody id="table">
        <?php foreach ($comercio->findAll() as $key => $value) : ?>
            <tr data-id="<?= $value->DT_Comercio ?>">
                <td data-label="data" data-type="date"><?= $value->DT_Comercio ?></td>
                <td data-label="descricao" data-type="text"><?= $value->DS_Comercio ?></td>
                <td data-label="hora-inicio" data-type="time"><?= $value->HR_Inicio ?></td>
                <td data-label="hora-termino" data-type="time"><?= $value->HR_Termino ?></td>
                <td data-label="action">
                        <button type='button' class='btn btn-warning btn-xs edit'><span
                                class='glyphicon glyphicon-edit'></span></button>
                        <button type='button' class='btn btn-danger btn-xs delete'><span
                                class='glyphicon glyphicon-trash'></span></button>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<button class="btn btn-primary form-control" id="add"><span class="glyphicon glyphicon-plus"></span> Adicionar
</button>
<table class="template" id="line">
    <tr>
        <td data-label="data" data-type="date"><input class="form-control" type="date" name="data"></td>
        <td data-label="descricao" data-type="text"><input class="form-control" type="text" name="descricao"></td>
        <td data-label="hora-inicio" data-type="time"><input class="form-control" type="time" name="inicio"></td>
        <td data-label="hora-termino" data-type="time"><input class="form-control" type="time" name="termino"></td>
        <td data-label="action"></td>
    </tr>
</table>
<div class="template" id="btn-salvar">
    <button class="btn btn-success btn-xs confirm" type="button"><span class="glyphicon glyphicon-check"></span> Salvar</button>
</div>
<div class="template" id="btn-editar">
    <button type='button' class='btn btn-warning btn-xs edit'>
        <span class='glyphicon glyphicon-edit'></span>
    </button>
    <button type='button' class='btn btn-danger btn-xs delete'>
        <span class='glyphicon glyphicon-trash'></span>
    </button>
</div>
<script type="text/javascript">
    $('#add').click(function () {
        var line = $('#line').find('tr').clone();
        line.children().last().html($('#btn-salvar').html());
        line.appendTo($('#table'));
    });

    $('#table').on('click','.confirm', function () {
        var data = {};
        var line = $(this).closest('tr');
        line.find('input').each(function () {
            data[$(this).attr('name')] = $(this).val();
        });
        if (line.attr('data-id') !== undefined && line.attr('data-id') !== null) {
            data['id'] = line.attr('data-id');
        }
        $.ajax({
            url: "./controle/grv_comercio.php",
            type: 'post',
            data: {data},
            dataType: 'json',
            success: function(result){
                fillTableLine(line,result);
                line.find('td').last().html($('#btn-editar').html());
                line.css('color','green');
                $.notify('Registro salvo com sucesso!','success');
            },
            error: function(xhr,status){
                inputParseText(line);
                line.find('td').last().html($('#btn-editar').html());
                line.css('color','red');
                $.notify('Falha ao tentar modificar o registro: ' + xhr.responseJSON.falha.errorInfo[2] + '','error');
                console.log(xhr);
                console.log(status);
            }
        });
    });

    function removeLine (line) {
        var data = {};
        if (line.attr('data-id') !== undefined && line.attr('data-id') !== null) {
            data['id'] = line.attr('data-id');
        }
        $.ajax({
            url: "./controle/rem_comercio.php",
            type: 'post',
            data: { data },
            dataType: 'json',
            success: function(result){
                $.notify('Item removido com sucesso!','success');
            },
            error: function(xhr,status){
                line.css('color','red');
                $.notify('Falha ao tentar remover o registro: ' + xhr.responseJSON.falha.errorInfo[2] + '','error');
                console.log(xhr);
                console.log(status);
            }
        });
        line.remove();
    };


    function inputParseText(line) {
        line.find('td').each(function (i) {
            $(this).html($(this).find('input').val());
        });
    }
    function fillTableLine(line,result) {
        line.attr('data-id',result.data);
        line.find('td').eq(0).html(result.data);
        line.find('td').eq(1).html(result.descricao);
        line.find('td').eq(2).html(result.inicio);
        line.find('td').eq(3).html(result.termino);
    }
    function textParseInput(line) {
        var templateInput = $('#line').find('input').clone();
        line.find('td').each(function (i) {
            templateInput.eq(i).val($(this).html());
            $(this).html(templateInput.eq(i));
        });
    }

    $('#table').on('click','.edit',function () {
        var line = $(this).closest('tr');
        textParseInput(line);
        line.find('td').last().html($('#btn-salvar').html());
    });

    $(document).on("click", ".delete", function (e) {
        var line = $(this).closest('tr');
        bootbox.confirm("Tem certeza que deseja excluir este item?", function (confirm) {
            if (confirm) {
                removeLine(line);
            }
        });
    });
    $(document).bind('keydown.alt_d', function (){
        $('.alert-info').show();
    });

</script>