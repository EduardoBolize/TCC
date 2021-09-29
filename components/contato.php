<section id="contact" class="section-bg wow fadeInUp">
    <div class="container">

    <div class="section-header">
        <h3>Contato</h3>
        <p>Espermos que venha nos conhecer, mas se preferir entre em contato conosco por meio dessas alternativas.</p>
    </div>

    <div class="row contact-info">

        <div class="col-md-4">
        <div class="contact-address">
            <i class="ion-ios-location-outline"></i>
            <h3></h3>
            <address> R. Caetano Moratori, 415 - Centro, Peruíbe - SP</address>
        </div>
        </div>

        <div class="col-md-4">
        <div class="contact-phone">
            <i class="ion-ios-telephone-outline"></i>
            <h3></h3>
            <p><a href="tel:+5513997785212">13 997785212</a></p>
        </div>
        </div>

        <div class="col-md-4">
        <div class="contact-email">
            <i class="ion-ios-email-outline"></i>
            <h3>Email</h3>
            <p><a href="mailto:info@example.com">info@example.com</a></p>
        </div>
        </div>

    </div>

    <div class="section-header">
        <p>Caso tenha alguma dúvida mande para nós por meio desse fomulário responderemos o mais breve.</p>
    </div>

    <div class="form">
        <div id="errormessage"></div>
        <form action="saladeaula/sac/emailenviar.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
            <input type="text" name="nm_sac" class="form-control" id="nm_sac" placeholder="Nome" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
            <div class="validation"></div>
            </div>
            <div class="form-group col-md-6">
            <input type="email" class="form-control" name="tx_email" id="tx_email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
            <div class="validation"></div>
            </div>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="ds_sac" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Messagem"></textarea>
            <div class="validation"></div>
        </div>
        <div class="text-center"><button type="submit"> Enviar &nbsp &nbsp <span class="glyphicon glyphicon-send"></button></div>
        </form>
    </div>

    </div>
</section><!-- #contact -->
