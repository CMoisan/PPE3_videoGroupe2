<?php
include_once('Modeles/Metiers/genre.php');

Class conteneurGenre
	{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $lesGenres;

	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct()
		{
		$this->lesGenres = new arrayObject();
		}

	//METHODE AJOUTANT UN genre------------------------------------------------------------------------------
	public function ajouteUnGenre($unId‪Genre, $unLibelleGenre)
		{
		$unGenre = new genre($unId‪Genre, $unLibelleGenre);
		$this->lesGenres->append($unGenre);

		}

	//METHODE RETOURNANT LE NOMBRE de genres-------------------------------------------------------------------------------
	public function nbGenre()
		{
		return $this->lesGenres->count();
		}

//Fonction retour
		public function listePropreDesGenres()
	{
	$tableau = array();
	foreach ($this->lesGenres as $unGenre) {
		$leLibelle = $unGenre->getLibelleGenre();
		$laphoto = $unGenre->getidGenre();
		$tableau[$leLibelle] = $laphoto;
	}
	return $tableau;
}

	//METHODE RETOURNANT LA LISTE DES Genres-----------------------------------------------------------------------------------------
	public function listeDesGenres()
		{
			?>
		<table>
			</body>
			<tbody>
		<tr>
		<?php

		$tableau = $this->listePropreDesGenres();
		$compteurTD = 0;
		foreach ($tableau as $Libelle => $photo)
		{
			$compteurTD = $compteurTD+1;
			echo '<td>< <div class="photoContainer"><img class="accueilPhotosPays" href="Affichage.php?Id='.$photo.'" src=Images/'.$photo.'>';
			echo '<form method="post" action="index.php?vue=Videotheque&action=choixGenre?Id='.$photo.'"><div class="accueilPhotosPaysOverlay">< <input type=submit div class="textOverlay" value='.$Libelle.'>  </input></form></div></div></div></td>';
			if (($compteurTD % 4) == 0)
			{
				echo '</tr><tr>';
			}
		}
		?>
			</tr>
			</tbody>
		</table>
	<?php
		}

		//METHODE RETOURNANT LA LISTE DES genres DANS UNE BALISE <SELECT>------------------------------------------------------------------
	public function lesGenresAuFormatHTML()
		{
		$liste = "<SELECT name = 'idGenre'>";
		foreach ($this->lesGenres as $unGenre)
			{
			$liste = $liste."<OPTION value='".$unGenre->getIdGenre()."'>".$unGenre->getLibelleGenre()."</OPTION>";
			}
		$liste = $liste."</SELECT>";
		return $liste;
		}

//METHODE RETOURNANT UN genre A PARTIR DE SON NUMERO--------------------------------------------
	public function donneObjetGenreDepuisNumero($unIdGenre)
		{
		//initialisation d'un booléen (on part de l'hypothèse que le genre n'existe pas)
		$trouve=false;
		$leBonGenre=null;
		//création d'un itérateur sur la collection lesGenres
		$iGenre = $this->lesGenres->getIterator();
		//TQ on a pas trouvé le genre et que l'on est pas arrivé au bout de la collection
		while ((!$trouve)&&($iGenre->valid()))
			{
			//SI le numéro du genre courant correspond au numéro passé en paramètre
			if ($iGenre->current()->getIdGenre() == $unIdGenre)
				{
				//maj du booléen
				$trouve=true;
				//sauvegarde du genre courant
				$leBonGenre = $iGenre->current();

				}
			//SINON on passe au genre suivant
			else
				$iGenre->next();
			}
		return $leBonGenre;
		}

	}

?>
