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
            <tr>
                <td data-label="data" data-type="date"><?php echo $value->DT_Comercio ?></td>
                <td data-label="descricao" data-type="text"><?php echo $value->DS_Comercio ?></td>
                <td data-label="hora-inicio" data-type="time"><?php echo $value->HR_Inicio ?></td>
                <td data-label="hora-termino" data-type="time"><?= $value->HR_Termino ?></td>
                <td data-label="action">
                        <input type='hidden' name='id' value='<?php echo $value->DT_Comercio ?>'>
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
<table id="template" style="display: none; visibility: hidden">
    <tr>
        <td data-label="data" data-type="date"><input class="form-control" type="date" name="data"></td>
        <td data-label="descricao" data-type="text"><input class="form-control" type="text" name="descricao"></td>
        <td data-label="hora-inicio" data-type="time"><input class="form-control" type="time" name="inicio"></td>
        <td data-label="hora-termino" data-type="time"><input class="form-control" type="time" name="termino"></td>
        <td data-label="action">
            <button class="btn btn-success btn-xs confirm" type="button"><span class="glyphicon glyphicon-check"></span> Salvar</button>
        </td>
    </tr>
</table>
<script type="text/javascript">
    $('#add').click(function () {
        $('#template').find('tr').clone().appendTo($('#table'));
    });

    $('#table').on('click','.confirm', function () {
        var data = {};
        var line = $(this).closest('tr');
        line.find('input').each(function () {
            data[$(this).attr('name')] = $(this).val();
        });
        $.ajax({
            url: "./controle/grv_comercio.php",
            type: 'post',
            data: {data},
            dataType: 'json',
            success: function(result){
                line.find('td').eq(0).html(result.data);
                line.find('td').eq(1).html(result.descricao);
                line.find('td').eq(2).html(result.inicio);
                line.find('td').eq(3).html(result.termino);
                line.find('td').eq(4)
                    .html(
                        "<button type='button' class='btn btn-warning btn-xs edit'>" +
                            "<span class='glyphicon glyphicon-edit'></span>" +
                        "</button> " +
                        "<button type='button' class='btn btn-danger btn-xs delete'>" +
                            "<span class='glyphicon glyphicon-trash'></span>" +
                        "</button>");
                $.notify('Registro salvo com sucesso!','success');
            },
            error: function(xhr,status,error){
                line.find('td').eq(0).html(line.find('input').val());
                line.find('td').eq(1).html(line.find('input').val());
                line.find('td').eq(2).html(line.find('input').val());
                line.find('td').eq(3).html(line.find('input').val());
                line.find('td').eq(4)
                    .html(
                        "<button type='button' class='btn btn-warning btn-xs edit'>" +
                        "<span class='glyphicon glyphicon-edit'></span>" +
                        "</button> " +
                        "<button type='button' class='btn btn-danger btn-xs delete'>" +
                        "<span class='glyphicon glyphicon-trash'></span>" +
                        "</button>");
                line.css('color','red');
                $.notify('Falha ao tentar modificar o registro','error');
                console.log(xhr);
                console.log(error);
                console.log(status);
            }
        });
    });
    $('#table').on('click','.edit',function () {
        $(this).closest('tr').find('td').each(function () {
            if ($(this).attr('data-label') != 'action') {
                $(this).html('<input type="' + $(this).attr('data-type') + '" class="form-control" value="' + $(this).html() + '">');
            } else {
                $(this).html('<button class="btn btn-success btn-xs confirm" type="button"><span class="glyphicon glyphicon-check"></span> Salvar</button>');
            }
        });
    });

    $(document).on("click", ".delete", function (e) {
        const form = $(this).parent();
        bootbox.confirm("Tem certeza que deseja excluir este item?", function (confirm) {
            if (confirm) {
                form.submit();
            }
        });
    });

</script>