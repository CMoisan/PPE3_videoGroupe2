<?php
Class sendMail
	{
	//ATTRIBUTS PRIVES---------------------------------------------------------------------------------------------------------------------------
	//CONSTRUCTEUR--------------------------------------------------------------------------------------------------------------------------------
		public function NouveauClient($idClient,$mailClient)
		{
			$mailAdmin= 'clement.teiva@gmail.com';
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mailAdmin))
			{
			$passage_ligne = "\r\n";
			}
			else
			{
			$passage_ligne = "\n";
			}
			//=====Déclaration des messages au format texte et au format HTML Admin.
			$message_txt = "Bonjour, un nouvel utilisateur s'est enregistré.";
			//$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
			//==========
			//=====Création de la boundary Admin
			$boundary = "-----=".md5(rand());
			//==========
			
			//=====Définition du sujet Admin.
			$sujet = "Nouvel Utilisateur";
			//=========
			
			//=====Création du header de l'e-mail Admin
			$header = "From: \"Admin\"$mailAdmin".$passage_ligne;
			$header .= "Reply-to: \"Admin\"$mailAdmin".$passage_ligne;
			$header .= "MIME-Version: 1.0".$passage_ligne;
			$header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//==========
			//=====Création du message Admin.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format texte Admin.
			$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format HTML Admin
			$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			//$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			//==========
			//=====Envoi de l'e-mail Admin.
			echo $mailAdmin;
			echo $sujet;
			mail($mailAdmin,$sujet,$message,$header);
			//==========
		}
	}
	
?>
