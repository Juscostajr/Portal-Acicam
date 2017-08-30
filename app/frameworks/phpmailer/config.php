<?php
 $mailer->IsSMTP();
    $mailer->Port = 465; //Indica a porta de conexão para a saída de e-mails
    $mailer->SMTPSecure = 'ssl';
    $mailer->Host = 'smtp.gmail.com'; //smtp.dominio.com.br
    $mailer->SMTPAuth = true; //define se haverá ou não autenticação no SMTP
    $mailer->CharSet = 'UTF-8';
    $mailer->Username = 'ti.acicam@gmail.com'; //Informe o e-mai o completo
    $mailer->Password = '@cicam.2016'; //Senha da caixa postal
    $mailer->From = 'ti.acicam@gmail.com'; //Obrigatório ser a mesma caixa postal indicada em "username"			