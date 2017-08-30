
<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 20/05/2016
 * Time: 16:35
 */
require_once "class/WideImage.php";
require_once "../app/model/Slider.php";
require_once "../app/frameworks/mensagens.php";

$slider = new Slider();

if ((!empty($_FILES["foto"])) && (isset($_POST['submit']))){

  $imagem = substr($_POST["nomefoto"],-4,-3) == '.' ? $_POST["nomefoto"] : $_POST["nomefoto"] . '.jpg' ;
  $slider->setTitulo($_POST["titulo"]);
  $slider->setSubtitulo($_POST["subtitulo"]);
  $slider->setPostagem($_POST["idpostagem"]);
  $slider->setImagem($imagem);


  $y = $_POST['y'];
  $x = $_POST['x'];
  $w = $_POST['w'];
  $h = $_POST['h'];




  try {
    WideImage::loadFromUpload("foto")->crop($x,$y,$w,$h)->resize(1000,500,'fill')->saveToFile("../img/destaques/$imagem",70);
    $slider->insert();
    echo alert(GREEN,"Destaque gravado com <b>sucesso!</b>");
  } catch (Exception $e) {
    echo alert(RED,"<b>Erro</b> ao tentar gravar destaque!<hr>$e");
  }
}
