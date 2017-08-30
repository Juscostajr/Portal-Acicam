<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 06/05/2016
 * Time: 15:53
 */

require_once "../app/model/Postagem.php";
require_once "class/WideImage.php";
require_once "../app/frameworks/mensagens.php";

$postagem = new Postagem();
if((isset($_POST['titulo']))&&(isset($_POST['texto']))){

    $foto = $_POST['imag'];

    if (!empty($_FILES["foto"])){
        try{
            WideImage::loadFromUpload("foto")->fitIn(400,400)->saveToFile("../img/fotos/$foto.jpg");
            WideImage::loadFromUpload("foto")->resize(470, 245, 'outside')->crop("center", "middle", 470, 245)->saveToFile("../img/fotos/$foto-med.jpg",60);
            WideImage::loadFromUpload("foto")->resize(470, 245, 'outside')->crop("center", "middle", 470, 245)->saveToFile("../img/fotos/fb/$foto.png");
            WideImage::loadFromUpload("foto")->resize(120, 120, 'outside')->crop("center", "middle", 120, 120)->saveToFile("../img/fotos/$foto-tumb.jpg",50);
            $falha = false;
            echo alert(GREEN,"Foto gravada com <b>Sucesso!</b>");
        }  catch (WideImage_Exception $e){
            $falha = true;
            echo alert(RED,"Não foi possível subir a imagem selecionada");
        }


        if ($falha == false){
            $postagem->setTitulo($_POST['titulo']);
            $postagem->setImagem($foto);
            $postagem->setConteudo($_POST['texto']);

            try {
                $postagem->insert();
                echo alert(GREEN,"Postagem efetuada com <b>Sucesso!</b>");
            } catch (Exception $e) {
                echo alert(RED,"<b>Falha</b> ao tentar gravar postagem!");
            }
        }
    }
}


