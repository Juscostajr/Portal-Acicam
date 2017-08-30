	<?php
if (isset($_POST['associese']))
{
    require_once('../class/phpmailer/class.phpmailer.php');
    $destino = "juscelino@acicam.com.br";
    $assunto = "Alerta Acicam";
	$endereco = $_POST['endereco'];
	$telefone = $_POST['tel'];
    $mensagem = "<table><tr><td>Nome</td><td>" . $_POST['nome'] .
" </td></tr><tr><td>E-Mail</td><td>" . $_POST['email'] .
"</td></tr><tr><td>Telefone</td><td>" . $_POST['tel'] . 
	" </td></tr><tr><td>CPF</td><td>" . $_POST['cpf'] .

	"</td></tr><tr><td>Nr. B.O.</td><td>" . $_POST['bo'] .
" </td></tr><tr><td>Ano B.O.</td><td>" . $_POST['ano'] .
" </td></tr><tr><td>Nr. Protocolo</td><td>" . $_POST['protocolo'] .
	 "</td></tr></table>";
	
	
	
    $mailer = new PHPMailer();
    include"../class/phpmailer/config.php";
    $mailer->FromName = $assunto; //Nome que serÃ¡ exibido para o destinatÃ¡rio
    $mailer->From = 'ti.acicam@gmail.com'; //ObrigatÃ³rio ser a mesma caixa postal indicada em "username"
    $mailer->AddAddress($destino,'NomeDestinatÃ¡rio'); //DestinatÃ¡rios
    $mailer->IsHTML(true);
	$mailer->Subject = $assunto;
    $mailer->Body = $mensagem;
    $mailer->Send();
    
	
	?> 
	<?php echo "<script>alert('Sua mensagem foi enviada com sucesso. Em breve entraremos em contato')</script>"; 
        header("Location: http://www.acicam.com.br");
}
else
{ ?>
<div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Alerta Acicam</h4>
            </div>
 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="modal-body">
			
			
            
     <div class="form-group ">
      <label class="control-label requiredField" for="nome">
       Nome
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="nome" name="nome" placeholder="Seu nome completo" type="text">
     </div>
<div class="form-group ">
      <label class="control-label requiredField" for="email">
       Email
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="email" name="email" placeholder="Email para contato" type="text">
     </div>
<div class="form-group ">
      <label class="control-label requiredField" for="tel">
       Telefone
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="tel" name="tel" type="text">
     </div>
     <div class="form-group ">
      <label class="control-label " for="cpf">
       CPF
      </label>
      <input class="form-control" id="cpf" name="cpf" placeholder="Seu CPF" type="text">
     </div>
 <div class="form-group ">
      <label class="control-label " for="bo">
       Nr. B.O.
      </label>
      <input class="form-control" id="bo" name="bo" placeholder="Boletim de Ocorr�ncia" type="text">
     </div>
<div class="form-group ">
      <label class="control-label" for="ano">
       Ano B.O.
      </label>
      <input class="form-control" id="ano" name="ano" placeholder="Ano da Ocorr�ncia" type="text">
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="protocolo">
       Nr. Protocolo
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="protocolo" name="protocolo" placeholder="Numero do Protocolo" type="text">
     </div>
     
     
 
       
      
	 </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" name="associese" value="Enviar">
            </div>
        </div>
    </form>

<?php } ?>	