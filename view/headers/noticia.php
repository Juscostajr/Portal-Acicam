
<meta property="og:url"                content="<?= $url ?>" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="<?= $postagem->DS_Titulo ?>" />
<meta property="og:image"              content="http://acicam.com.br/img/fotos/fb/<?= $postagem->Img_Postagem ?>.png" />
<meta property="og:description"        content="<?= strip_tags($postagem->Conteudo) ?>" />
<meta property="fb:admins"        content="1465505251" />

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- facebook compartilhar -->

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>