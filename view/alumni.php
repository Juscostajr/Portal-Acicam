


<?php if(!$error && isset($_POST['submit'])): ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        Sua protosta foi enviada com <strong>Sucesso!</strong>
    </div>
<?php endif ?>
<?php if($error && isset($_POST['submit'])) : ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Falha!</strong> <?= $error ?>
    </div>
<?php endif ?>


<div class="container">
    <div class="row">
        <div class="col-md-12"><h2>Balcão de Oportunidades</h2>
            <p>Na Faculdade Integrado, o compromisso com o aperfei&ccedil;oamento pessoal e profissional do acad&ecirc;mico&nbsp;n&atilde;o acaba no fim&nbsp;da gradua&ccedil;&atilde;o, isso porque o sucesso do egresso &eacute; nossa realiza&ccedil;&atilde;o. Ao logo de nossa hist&oacute;ria, j&aacute; formamos mais de&nbsp;5.000 profissionais,&nbsp;e esse n&uacute;mero continua crescendo&nbsp;a cada semestre. S&atilde;o milhares de pessoas preparadas para trilhar o caminho de suas realiza&ccedil;&otilde;es, atendendo da melhor forma poss&iacute;vel as exig&ecirc;ncias do mercado de trabalho.</p>
            <p>Nesse sentido &eacute; que desenvolvemos o &ldquo;Balc&atilde;o de Oportunidades&rdquo;, uma ferramenta online onde sua empresa poder&aacute; divulgar vagas de emprego ou est&aacute;gio, para que nossos egressos e acad&ecirc;micos possam candidatar-se a elas, de forma pr&aacute;tica e r&aacute;pida, facilitando a comunica&ccedil;&atilde;o e favorecendo a inser&ccedil;&atilde;o de bons profissionais no mercado de trabalho.</p>
            <p>Para divulgar uma vaga &eacute; f&aacute;cil &eacute; r&aacute;pido, basta preencher o formul&aacute;rio abaixo. Ap&oacute;s a publica&ccedil;&atilde;o em nosso Balc&atilde;o de Oportunidades, e de acordo com o perfil de exig&ecirc;ncia da vaga, nossos egressos e acad&ecirc;micos poder&atilde;o se candidatar a mesma, encaminhando de forma eletr&ocirc;nica curr&iacute;culo e carta de apresenta&ccedil;&atilde;o, direto ao respons&aacute;vel pelo processo de sele&ccedil;&atilde;o. Encerrado o per&iacute;odo para candidatar-se &agrave; vaga, um pedido de confirma&ccedil;&atilde;o ser&aacute; enviado ao respons&aacute;vel pelo processo de sele&ccedil;&atilde;o, respondendo a esse, a vaga poder&aacute; continuar dispon&iacute;vel ou ser&aacute; removida do nosso quadro de oportunidades, podendo ser reaberta em qualquer momento, sempre que solicitada.</p>
            <p>Seja parceiro e selecione os melhores profissionais.</p>

            <h3>Cadastrar Vaga</h3>
            <form role="form" method="post" autocomplete="on">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Informe seu e-mail" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Empresa ou Ramo de atividade:</label>
                            <input type="text" class="form-control" name="empresa" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cargo</label>
                            <input type="text" class="form-control" name="cargo" placeholder="Informe o cargo disponível" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Estado</label>
                            <select id="estados" name="uf" class="form-control" required>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cidade</label>
                            <select id="cidades" name="cidade" class="form-control" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <label>Salário</label>
                    <div class="input-group">
                        <div class="input-group-addon">R$</div>
                        <input type="number" step="0.01" class="form-control" name="salario" placeholder="Se desejar, informe o salário">
                    </div>
                </div>

                <div class="form-group">
                    <label>Benefícios Oferecidos</label>
                    <textarea class="form-control" rows="5" name="beneficio"></textarea>
                </div>

                <div class="form-group">
                    <label>Requisitos / Exigências</label>
                    <textarea class="form-control" rows="5" name="requisito" required></textarea>
                </div>

                <div class="form-group">
                    <label>Atribuições do Cargo / Descrição da Vaga</label>
                    <textarea class="form-control" rows="5" name="descricao" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nome do Responsável Pela Vaga</label>
                            <input type="text" class="form-control" name="responsavel" placeholder="Responsável em receber os currículos" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>E-mail do responsável</label>
                            <input type="email" class="form-control" name="emailresponsavel" placeholder="Endereço para receber os currículos" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Data limite para divulgação</label>
                    <input type="date" class="form-control" name="data" required>
                </div>

                <input type="submit" class="btn btn-success" name="submit" value="Enviar">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center"><img class="img-responsive" src="/img/acicam-integrado.png"></div>
    </div>
</div>
