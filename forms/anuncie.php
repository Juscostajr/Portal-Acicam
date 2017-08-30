	<?php
if (isset($_POST['associese']))
{
    require_once('../class/phpmailer/class.phpmailer.php');
    $destino = "nicomercial@acicam.com.br";
    $assunto = "Agendamento de Visita";
	$endereco = $_POST['endereco'];
	$telefone = $_POST['tel'];
    $mensagem = "<table><tr><td>Empresa</td><td>" . $_POST['empresa'] . 
	" </td></tr><tr><td>Responsável</td><td>" . $_POST['nome'] .
" </td></tr><tr><td>E-Mail</td><td>" . $_POST['email'] .
	"</td></tr><tr><td>Endereço</td><td>" . $_POST['endereco'] .
	"</td></tr><tr><td>Endereço</td><td>" . $_POST['tel'] . "</td></tr></table>";
	
	
	
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
                <h4 class="modal-title">Anuncie</h4>
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
      <input class="form-control" id="nome" name="nome" placeholder="Como gostaria de ser chamado?" type="text">
     </div>
     <div class="form-group ">
      <label class="control-label " for="empresa">
       Nome da Empresa
      </label>
      <input class="form-control" id="empresa" name="empresa" placeholder="Nome Fantasia" type="text">
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="endereco">
       Endere�o
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="endereco" name="endereco" placeholder="Endere�o da Empresa" type="text">
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
 
       
      
	 </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" name="associese" value="Enviar">
            </div>
        </div>
    </form>

<?php } ?>	