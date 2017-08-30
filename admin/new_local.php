<br>
<?php require_once "controle/grv_local.php"; ?>
<script type="text/javascript" src="js/mapa.js"></script>
<script type="text/javascript" src="js/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<form method="post" role="form" action=""  enctype="multipart/form-data">
    Título
    <div class="form-group">
        <input type="text" class="form-control" name="titulo">
    </div>
    <div class="campos">
        Endereço:
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" />
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" /><span class="glyphicon glyphicon-map-marker"></span> Posicionar</button>
                </span>
            </div>
        </div>
        
        <div id="mapa"></div>

        Imagem
        <div class='form-group'><input id='file' type='file' name='foto' class='file' data-show-preview='true'></div>
        Comentario
        <div class="form-group">
            <input type="text" class="form-control" name="comentario">
        </div>

        <input type="hidden" id="txtLatitude" name="txtLatitude" />
        <input type="hidden" id="txtLongitude" name="txtLongitude" />
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success btn-block">
        </div>
</form>

<script>
    $("#file").fileinput({
        language: "pt-BR",
        showUpload: false,
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
    $('#submit-btn').click(function(){
        $('#hospedeira').html(
            $("#editor").html()
        );
    });
</script>