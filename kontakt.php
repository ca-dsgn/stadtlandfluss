<?php 
	include "parts/header.php";
	include "parts/backButton.php";
?>

<div id="singlepageContent">
	<div class="wrapper">
		<div id="text">
		
		<h1>Kontakt</h1>
		
		<p>Sie haben ein <strong>Wunschthema</strong> für unsere n&auml;chste Film-Kampagne? Sie haben <strong>Fragen</strong> zu unserem Projekt? Sie m&ouml;chten aus einem anderen Grund <strong>Kontakt</strong> zu uns aufnehmen?</p>

		<p>Bitte nutzen Sie hierf&uuml;r das folgende Kontaktformular:</p>
		
	    <?php
	    // wenn das Formular übermittelt wurde
	    if(isset($_POST['abschicken'])){
	      while(list($feld,$wert)=each($_POST)){
	        // übermittelte Inhalte "entschärfen"
	        $wert=preg_replace("/(content-type:|bcc:|cc:|to:|from:)/im", "",$wert);
	        $$feld=$wert;
	        // die übermittelten Variablen werden zum "Text der Email" zusammengefasst
	        if($feld!="abschicken") $mailnachricht.=ucfirst($feld).": $wert<br/>\n";
	      }
	      $mailnachricht.="\nDatum/Zeit: ". date("d.m.Y H:i:s");
	      // Überprüfen ob alle Pflichtfelder gefüllt sind
	      empty($nachname) ? $err[] = "Nachname" : false;
	      empty($vorname) ? $err[] = "Vorname" : false;
	      empty($email) ? $err[] = "E-Mailadresse" : false;
	      empty($text) ? $err[] = "Freitextfeld" : false;
	      // wenn nicht, werden die Fehlermeldungen ausgegeben und das "halbgefüllte" Formular angezeigt
	      if(!empty($err)) {
	        echo "<p class='error'><strong>Ihre Daten konnten leider nicht versendet werden. Bitte &uuml;berpr&uuml;fen Sie folgende Felder auf Vollst&auml;ndigkeit:</strong></p><ul class='error'>";
	        foreach($err as $fehler){
	          echo "<li>" . $fehler."</li>";
	        } 
	        echo "</ul>"?>
	        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	        <table width="100%" border="0" cellpadding="10" cellspacing="10">
	        <tr><td width="140" align="right">*Nachname:</td><td align="left"><input type="text" name="nachname" value="<?php echo $nachname; ?>" style="width:100%;" /></td></tr>
	        <tr><td align="right">*Vorname:</td><td align="left"><input type="text" name="vorname" value="<?php echo $vorname; ?>" style="width:100%" /></td></tr>
	        <tr><td align="right">Firma:</td><td align="left"><input type="text" name="firma" value="<?php echo $firma; ?>" style="width:100%" /></td></tr>
	        <tr><td align="right">Postanschrift:</td><td align="left"><input type="text" name="strasse" value="<?php echo $strasse; ?>" style="width:100%" /></td></tr>
	        <tr><td align="right">Telefon:</td><td align="left"><input type="text" name="telefon" value="<?php echo $telefon; ?>" style="width:100%" /></td></tr>
	        <tr><td align="right">*E-Mail:</td><td align="left"><input type="text" name="email" value="<?php echo $email; ?>" style="width:100%" /></td></tr>
	        <tr><td colspan="2"><textarea rows="12"  style="width:100%" name="text"><?php echo $text; ?></textarea></td><td> </td></tr>
	        <tr><td colspan="2" align="center" nowrap><br /><input type="reset" value="Formular l&ouml;schen" style="width:200px;" />  <input type="submit" name="abschicken" class="button" value="Formular absenden" style="width:200px;" /></td></tr>
	        </table>
	        </form>
	        <p id="last">*Pflichtfelder</p>
	    <?php    // sind keine Fehler vorhanden, wird die Email versendet
	      } else {
			
			/* Update CA 10.07.2012*/
			$msg = $mailnachricht;
			$subject = "Kontaktformular ".$_SERVER['HTTP_HOST'];
			
			$receiver = "wirth@dhbw-mosbach.de";
			
			$mail_content = "<h1>Nachricht von ".$vorname." ".$nachname."</h1>
							 <p>".$msg."</p>";
	
			$from = "From: Mineralsgems <info@mineralsgems.de>\n";
			$from .= "Reply-To: ".$email."\n";
			$from .= "Content-Type: text/html; charset=UTF-8\n";
	
			echo (mail($receiver, $subject, $mail_content, $from)) ? "<p>Vielen Dank f&uuml;r Ihre eMail!</p>": "<p class='error'>Ein Fehler ist aufgetreten! Bitte kontaktieren Sie uns über die im Impressum genannten Informationen.</p>";
			
	      }
	    // das Formular welches als erstes dem Besucher angezeigt wird
	    } else { ?>
	        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	        <table width="100%" border="0" cellpadding="10" cellspacing="10">
	        <tr><td width="140" align="right">*Nachname:</td><td align="left"><input type="text" name="nachname" value="" style="width:100%;" /></td></tr>
	        <tr><td align="right">*Vorname:</td><td align="left"><input type="text" name="vorname" value="" style="width:100%" /></td></tr>
	        <tr><td align="right">Firma:</td><td align="left"><input type="text" name="firma" value="" style="width:100%" /></td></tr>
	        <tr><td align="right">Postanschrift:</td><td align="left"><input type="text" name="strasse" value="" style="width:100%" /></td></tr>
	        <tr><td align="right">Telefon:</td><td align="left"><input type="text" name="telefon" value="" style="width:100%" /></td></tr>
	        <tr><td align="right">*E-Mail:</td><td align="left"><input type="text" name="email" value="" style="width:100%" /></td></tr>
	        <tr><td colspan="2"><textarea rows="12"  style="width:100%" name="text"></textarea></td><td> </td></tr>
	        <tr><td colspan="2" align="center" nowrap><br /><input type="reset" value="Formular l&ouml;schen" style="width:200px" />  <input type="submit" name="abschicken" value="Formular absenden" style="width:200px" /></td></tr>
	        </table>
	        </form>
	        <p id="last">*Pflichtfelder</p>
	    <?php
	    }
	    ?> 
		
		</div>
	</div>
</div>


<?php
	include 'parts/footer.php';
	
?>
