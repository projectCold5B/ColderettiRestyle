<?php



require 'php/db.php';
$db = new database;

require 'php/obj.php';
$obj= new objectclass;

 ?>

<!DOCTYPE html>
<html lang="it">
<head>
  <title>Contatti</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
$obj->Navbar($db->CheckLog());

?>
  
<div class="container">

            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">

                    <h1>Assistenza e Contatti</h1>

                    <p class="lead">Se hai bisogno di assistenza, inviaci un messaggio.</p>
                    <p class="lead">Ti risponderemo nel tempo più breve possibile.</p>


                    <form id="contact-form" method="post" action="contact-2.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Nome *</label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Inserisci il tuo nome *" required="required" data-error="Inserisci il campo nome.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Cognome *</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Inserisci il tuo cognome *" required="required" data-error="Inserisci il campo cognome.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Inserisci la tua email *" required="required" data-error="Inserisci una Email valida.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Telefono</label>
                                        <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Inserisci il tuo numero di telefono">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Messaggio *</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Inserisci messaggio *" rows="4" required="required" data-error="Inserisci un messaggio."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send" value="Invio">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                        </div>

                    </form>

                </div><!-- /.8 -->

            </div> <!-- /.row-->

        </div> <!-- /.container-->

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>