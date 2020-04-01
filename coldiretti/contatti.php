<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contatti script</title>
  </head>
  <body>
    <?php

      $nome=$_POST['nome'];
      $email=$_POST['email'];
      $oggetto=$_POST['oggetto'];
      $telefono=$_POST['telefono'];
      $messaggio=$_POST['messaggio'];

      if ($nome==null||$email==null||$oggetto==null||$messaggio==null||telefono==null)
        echo "<center>Attenzione, compilare tutti i campi</center> <br><br>".file_get_contents("contatti.html");
      else {
        require '../php/checkmail.php';
        $check->chkEmail($email);
        if (chkEmail)
          invioMail();
        else
          echo "<center>Inserire una mail valida</center><br><br>".file_get_contents("contatti.html");
      }

      //invio della mail di contatto a Coldiretti
      function invioMail()
      {
        //rendo globali i dati inseriti dall'utente
        global $nome, $email, $oggetto, $messaggio, $telefono;

          //invio della mail al destinatario
          // definisco mittente e destinatario della mail
           $nome_mittente = $nome;
           $mail_mittente = $mail;
           $mail_destinatario = "Mail Coldiretti";

           // definisco il subject
           $mail_oggetto = "Nuovo conatto: ".$oggetto;

           // definisco il messaggio formattato in HTML
           $mail_corpo = "
           <html>
           <head>
           <title>Contatto</title>
           </head>
           <body>
           Nuova richiesta di contatto da parte di $nome, tel. $telefono.
           <br>
           <br>
           Messaggio:
           <br>
           $messaggio
           <br>
           <br>
           </body>
           </html>";
           // aggiusto un po' le intestazioni della mail
           // E' in questa sezione che deve essere definito il mittente (From)
           // ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
           $mail_headers = "From: " .  $nome_mittente . " <" .  $mail_mittente . ">\r\n";
           $mail_headers .= "Reply-To: " .  $mail_mittente . "\r\n";
           $mail_headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

           // Aggiungo alle intestazioni della mail la definizione di MIME-Version,
           // Content-type e charset (necessarie per i contenuti in HTML)
           $mail_headers .= "MIME-Version: 1.0\r\n";
           $mail_headers .= "Content-type: text/html; charset=iso-8859-1";
           if (mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers)) //Se la mail viene inviata con successo allora...
             {echo "<center><h2>Messaggio inviato con successo a Coldiretti</h2></center>";
               if (confermaInvio())
                echo "<center>Controlla la tua casella mail, riceverai la conferma.</center>";
             }
           else {
             echo "<center>Errore. Nessun messaggio inviato. Verificare che l'indirizzo inserito sia corretto<center>".file_get_contents("contatti.html");
      }

      //invio della mail di conferma all'utente
      function confermaInvio()
      {
        //rendo globali i dati inseriti dall'utente
        global $nome, $email, $oggetto, $messaggio, $telefono;

        // definisco mittente e destinatario della mail
         $nome_mittente = "Coldiretti";
         $mail_mittente = "Mail Coldiretti";
         $mail_destinatario = "Mail Coldiretti";

         // definisco il subject
         $mail_oggetto = "Mail di contatto Coldiretti inviata con successo";

         // definisco il messaggio formattato in HTML
         $mail_corpo = "
         <html>
         <head>
         <title>Contatto</title>
         </head>
         <body>
         Il tuo messaggio è stato inviato correttamente a Coldiretti.
         <br>
         Riceverai una risposta il prima possibile.
         <br>
         Grazie.
         </body>
         </html>";
         // aggiusto un po' le intestazioni della mail
         // E' in questa sezione che deve essere definito il mittente (From)
         // ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
         $mail_headers = "From: " .  $nome_mittente . " <" .  $mail_mittente . ">\r\n";
         $mail_headers .= "Reply-To: " .  $mail_mittente . "\r\n";
         $mail_headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

         // Aggiungo alle intestazioni della mail la definizione di MIME-Version,
         // Content-type e charset (necessarie per i contenuti in HTML)
         $mail_headers .= "MIME-Version: 1.0\r\n";
         $mail_headers .= "Content-type: text/html; charset=iso-8859-1";
         mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers))
      }
     ?>
  </body>
</html>
