<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 23/12/2016
 * Time: 22:46
 */
class Alumni
{
    public function index()
    {
        require_once('./app/frameworks/phpmailer/class.phpmailer.php');
        date_default_timezone_set('America/Sao_Paulo');
        $error = false;


        if (isset($_POST['submit']) || !empty($_POST)) {

            foreach ($_POST as $chave => $valor) {
                $$chave = trim(strip_tags($valor));
            }

            try {
                $data = new DateTime($data);
                $data = $data->format('d/m/Y');
            } catch (Exception $e) {
                $error = 'A data inserida é inválida';
            }


            $destino = "alumni@grupointegrado.br";
            $assunto = "Nova vaga - " . $empresa;


            $mensagem =
                "<table><tr>" .
                "<td>E-mail</td><td>" . $email .
                "</td></tr><tr><td>Empresa ou Ramo de atividade</td><td>" . $empresa .
                "</td></tr><tr><td>Cargo</td><td>" . $cargo .
                "</td></tr><tr><td>Cidade</td><td>" . $cidade .
                "</td></tr><tr><td>Estado</td><td>" . $uf .
                "</td></tr><tr><td>Salário</td><td>" . $salario .
                "</td></tr><tr><td>Benefícios Oferecidos</td><td>" . $beneficio .
                "</td></tr><tr><td>Requisitos / Exigências</td><td>" . $requisito .
                "</td></tr><tr><td>Atribuições do Cargo / Descrição da Vaga</td><td>" . $descricao .
                "</td></tr><tr><td>Nome do Responsável Pela Vaga</td><td>" . $responsavel .
                "</td></tr><tr><td>E-mail do responsável</td><td>" . $emailresponsavel .
                "</td></tr><tr><td>Data limite para divulgação</td><td>" . $data .
                "</td></tr></table>";

            $mailer = new PHPMailer();
            require_once "./app/frameworks/phpmailer/config.php";
            $mailer->FromName = $assunto;
            $mailer->From = 'ti.acicam@gmail.com';
            $mailer->AddAddress($destino, 'Alumni');
            $mailer->IsHTML(true);
            $mailer->Subject = $assunto;
            $mailer->Body = $mensagem;

            if(!$mailer->Send()) {$error='Erro de servidor';}

        }
        include './view/alumni.php';

    }
        public function head(){
            ob_start();
            include( './view/headers/alumni.php' );
            return ob_get_clean();
        }
    }