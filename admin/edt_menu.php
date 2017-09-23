<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 15:33
 */

//require_once "controle/rem_menu.php";
require_once "../app/model/menu.php";
require_once "../app/model/pagina.php";
require_once "class/Pagger.php";
require_once "../app/frameworks/strings.php";
$pagger = new Pagger('./?pg=calendario&aba=editar');
$menu = new Menu();
$pagina = new PaginaModel();
?>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Submenu de:</th>
            <th>Url</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody id="table">
        <?php foreach ($menu->findMainMenu() as $avo): ?>
            <tr class="danger" data-id="<?= $avo->ID_Menu ?>">
                <td data-label="titulo" data-type="text"><?= $avo->DS_Titulo ?></td>
                <td data-label="titulo-pai" data-type="text"></td>
                <td data-label="url" data-type="text"><?= $avo->Pagina_DS_URL ?></td>
                <td data-label="action">
                        <button type='button' class='btn btn-warning btn-xs edit'><span
                                class='glyphicon glyphicon-edit'></span></button>
                        <button type='button' class='btn btn-danger btn-xs delete'><span
                                class='glyphicon glyphicon-trash'></span></button>
                </td>
            </tr>
            <?php foreach ($menu->findChildMenu($avo->ID_Menu) as $key => $pai): ?>
                <tr class="info" data-id="<?= $avo->ID_Menu ?>">
                    <td data-label="titulo" data-type="text"><?= $pai->DS_Titulo ?></td>
                    <td data-label="titulo-pai" data-type="text" data-id="<?= $avo->ID_Menu ?>"><?= $avo->DS_Titulo ?></td>
                    <td data-label="url" data-type="text"><?= $pai->Pagina_DS_URL ?></td>
                    <td data-label="action">
                            <button type='button' class='btn btn-warning btn-xs edit'><span
                                    class='glyphicon glyphicon-edit'></span></button>
                            <button type='button' class='btn btn-danger btn-xs delete'>
                                <span class='glyphicon glyphicon-trash'></span></button>
                    </td>
                </tr>
                <?php foreach ($menu->findChildMenu($pai->ID_Menu) as $filho): ?>
                    <tr data-id="<?= $avo->ID_Menu ?>">
                        <td data-label="titulo" data-type="text"><?= $filho->DS_Titulo ?></td>
                        <td data-label="titulo-pai" data-type="text" data-id="<?= $pai->ID_Menu ?>"><?= $pai->DS_Titulo ?></td>
                        <td data-label="url" data-type="text"><?= $filho->Pagina_DS_URL ?></td>
                        <td data-label="action">
                                <button type='button' class='btn btn-warning btn-xs edit'><span
                                        class='glyphicon glyphicon-edit'></span></button>
                                <button type='button' class='btn btn-danger btn-xs delete'>
                                    <span class='glyphicon glyphicon-trash'></span></button>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endforeach ?>
        <?php endforeach ?>
        </tbody>
    </table>
    <button class="btn btn-primary form-control" id="add"><span class="glyphicon glyphicon-plus"></span> Adicionar
    </button>
    <table class="template" id="line">
        <tr>
            <td data-label="titulo" data-type="text">
                <input type="text" class="form-control" name="titulo" placeholder="Título">
            </td>
            <td data-label="titulo-pai" data-type="text">
                <select class="select form-control" data-live-search="true" name="pai">
                    <?php foreach ($menu->findAll() as $itemMenu): ?>
                        <option value="<?= $itemMenu->ID_Menu ?>"><?= $itemMenu->DS_Titulo ?></option>
                    <?php endforeach ?>
                </select>
            </td>
            <td data-label="url" data-type="text">
                <select class="select form-control" data-live-search="true" name="url">
                    <?php foreach ($pagina->findAll() as $pag): ?>
                        <option value="<?= $pag->DS_URL ?>"><?= $pag->DS_URL ?></option>
                    <?php endforeach ?>
                </select>
            <td data-label="action">
                <div class="btn btn-success btn-xs confirm ld-over-inverse" type="button">
                    <span class="glyphicon glyphicon-check"></span> Salvar
                    <div class="ld ld-ring ld-spin"></div>
                </div>
            </td>
        </tr>
    </table>
    <button class="template" id="btn-salvar">
        <div class="btn btn-success btn-xs confirm ld-over-inverse" type="button">
            <span class="glyphicon glyphicon-check"></span> Salvar
            <div class="ld ld-ring ld-spin"></div>
        </div>

    </button>
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

            $('#table').find('.select').selectpicker('val', '');
            $('#table').find('.select').selectpicker('render');

        });

        $('#table').on('click','.confirm', function () {
            $(this).attr('class','btn btn-success btn-xs confirm ld-over-inverse running');
            $(this).attr('readonly','true');
            var data = {};
            var line = $(this).closest('tr');
            line.find('input,select').each(function () {
                data[$(this).attr('name')] = $(this).val();
            });
            if (line.attr('data-id') !== undefined && line.attr('data-id') !== null) {
                data['id'] = line.attr('data-id');
            }
            console.log(data);
            $.ajax({
                url: "./controle/grv_menu.php",
                type: 'post',
                data: {data},
                dataType: 'json',
                success: function(result){
                    console.log(result);
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
                url: "./controle/rem_menu.php",
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
            line.attr('data-id',result.id);
            line.find('td').eq(0).html(result.titulo);
            line.find('td').eq(1).html(result.pai.titulo);
            line.find('td').eq(1).attr('data-id',result.pai.id);
            line.find('td').eq(2).html(result.url);
        }
        function textParseInput(line) {
            var templateInput = $('#line').find('input,select').clone();
            line.find('td').each(function (i) {
                    templateInput.eq(i).val($(this).html());
                    $(this).html(templateInput.eq(i));
                    $(this).find('.select').selectpicker('render');
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

    </script>