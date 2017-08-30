<div class="espaco"></div>
<footer class="panel-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3"><h2>Fale Conosco</h2>
                <form role="form" method="post" action="/home/faleConosco/" autocomplete="on">
                    <input type="hidden" name="name">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" name="nome" placeholder="pessoa/empresa" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Informe seu e-mail" required>
                    </div>
                    <div class="form-group">
                        <label>Assunto:</label>
                        <input type="text" class="form-control" name="assunto" placeholder="Inoforme o assunto"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comentário</label>
                        <textarea class="form-control" rows="8" name="comentario" required></textarea>
                    </div>

                    <input type="submit" class="btn btn-success" name="faleconosco" value="Enviar">
                </form>
            </div>
            <div class="col-md-3">
                <h2>Encontre-nos</h2>
                <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMHiumfKA7H5htl7vvy4HTVyMGw4LLVUU&callback=initMap"
                    async defer></script>
                <div style='overflow:hidden'>
                    <div id='map' style='height:400px;width:100%;'></div>
                </div>
            </div>
            <div class="col-md-3">
                <!-- Facebook Plugin -->
                <div>
                    <h2>Facebook</h2>
                    <div style="width: 265px; margin: 0 auto;">
                        <iframe
                            src="https://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Facicamcm&width=265&height=360&show_faces=true&colorscheme=light&stream=true&show_border=true&header=true"
                            width="265px" height="360px" style="border:none;overflow:hidden" scrolling="no"
                            frameborder="0" allowTransparency="true"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2>Associe-se</h2>
                Você pode fazer parte da comunidade empresarial de Campo Mourão e região. Ao associar-se a ACICAM,
                simultâneamente, sua empresa estará unida ao nosso portf&oacute;lio de serviços, parcerias e programas
                de qualificação profissional. Contribuirá contudo para manter projetos e ações que visam defender da
                classe empreendedora mourãoense.
                <hr>
                <button class="btn btn-success" onClick="window.location='/pagina/36'">Quero me Associar!</button>
            </div>
        </div>
    </div>
</footer>
<div id="subfooter">
    <div class="text-center">
        <img src="/img/logo-acicam1.png" width="100px">
        <br>Associação Comercial e Industrial de Campo Mourão
        <br><span class="glyphicon glyphicon-earphone"></span> (44) 3518-8000
    </div>
</div>

<script type="text/javascript" src="/assets/js/app.js"></script>

</body>
</html>