<?php
session_start();
// Connexion à la BDD 
$link = mysqli_connect('localhost', 'root', '', 'basededonnees');
// Si base de données en UTF-8, utiliser la fonction utf8_decode pour tous les champs de texte à afficher
// extraction des données à afficher dans le sous-titre (nom de l'hôtel et sa description)


  $id_salle = $_POST['id_salle'];
  $id_client = $_SESSION['id_client'];
  $date = $_SESSION['date'];

 $sql =  "INSERT INTO reservation (id_salle, id_client, date) 
          VALUES ('$id_salle', '$id_client', '$date')";


$requete = "SELECT * FROM salle WHERE id_salle='" . $_POST["id_salle"] . "'";
$result = mysqli_query($link, $requete);

// tableau des résultats de la ligne > $data_salle['nom_champ']
while ($r = mysqli_fetch_array($result)) {
	$data_salle = $r;
}
mysqli_free_result($result);

// Appel de la librairie FPDF
require("fpdf/fpdf.php");

// Création de la class PDF
class PDF extends FPDF
{

	// Header: L'entête du document (Dévis):
	function Header()
	{
		$this->SetFont('Helvetica', '', 'I', 11);
		$this->Cell(60, 0, "Date : " . date("d/m/Y"), 0, 1, 'L');
		// Saut de ligne 20 mm

		$this->Ln(25);

		// Titre gras (B) police Helbetica de 11
		$this->SetFont('Helvetica', 'B', 'I', 11);
		// fond de couleur gris (valeurs en RGB)
		$this->setFillColor(230, 230, 230);
		// position du coin supérieur gauche par rapport à la marge gauche (mm)
		
		$this->SetX(70);
		// Texte : 60 >largeur ligne, 8 >hauteur ligne. Premier 0 >pas de bordure, 1 >retour à la ligneensuite, C >centrer texte, 1> couleur de fond ok	
		$this->Cell(60, 8, 'DEVIS DE RESERVATION', 0, 1, 'C', 1);
		
		// Saut de ligne 10 mm
		$this->Ln(10);
	}
	// Footer du document
	function Footer()
	{
		// Positionnement à 1,5 cm du bas
		$this->SetY(-15);
		// Police Arial italique 8
		$this->SetFont('Helvetica', 'I', 10);
		// Numéro de page, centré (C)
		$this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}

// On active la classe une fois pour toutes les pages suivantes
// Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.)
$pdf = new PDF('P', 'mm', 'A4');

// Nouvelle page A4 (incluant ici logo, titre et pied de page)
$pdf->AddPage();
// Polices par défaut : Helvetica taille 9
$pdf->SetFont('Helvetica', '', 9);
// Couleur par défaut : noir
$pdf->SetTextColor(0);
// Compteur de pages {nb}
$pdf->AliasNbPages();

$pdf->Image('images/' . $data_salle["image"], 160, 1, 50, 50);

// Sous-titre calées à gauche, texte gras (Bold), police de caractère 11
$pdf->SetFont('Helvetica', 'B', 11);
// couleur de fond de la cellule : gris clair
$pdf->setFillColor(0, 0, 0);
// Cellule avec les données du sous-titre sur 3 lignes, pas de bordure mais couleur de fond grise
$pdf->Cell(60, 6, strtoupper(utf8_decode($data_salle['nom_salle'])), 0, 5);
$pdf->Cell(60, 6, strtoupper(utf8_decode($data_salle['adresse_salle'])), 0, 5);

$pdf->Cell(75, 6, strtoupper(utf8_decode($data_salle['responsable_salle'])), 0, 5);
$pdf->Cell(75, 6, strtoupper(utf8_decode($data_salle['mail_contact_salle'])), 0, 5);
$pdf->Cell(75, 6, strtoupper(utf8_decode($data_salle['telephone_salle'])), 0, 5);

$pdf->MultiCell(0, 12, "Description de l'offre:", 0, 5);
$pdf->SetFont('Helvetica', '', 11);
$pdf->MultiCell(0, 10, utf8_decode($data_salle['description']), 0, 12);
$pdf->Ln(10); // saut de ligne 10mm	


// Fonction en-tête des tableaux en 3 colonnes de largeurs variables
function entete_table($position_entete)
{
	global $pdf;
	$pdf->SetDrawColor(183); // Couleur du fond RVB
	$pdf->SetFillColor(221); // Couleur des filets RVB
	$pdf->SetTextColor(0); // Couleur du texte noir
	$pdf->SetY($position_entete);

	// position de colonne 1 (10mm à gauche)	
	$pdf->SetX(10);
	$pdf->Cell(50, 8, 'NOM SOCIETE', 1, 0, 'C', 1);	// 60 >largeur colonne, 8 >hauteur colonne

	// position de colonne 2 (10mm à gauche)	
	$pdf->SetX(60);
	$pdf->Cell(50, 8, 'RESPONSABLE CLIENT', 1, 0, 'C', 1);	// 60 >largeur colonne, 8 >hauteur colonne

	// position de la colonne 3 (70 = 10+60)
	$pdf->SetX(110);
	$pdf->Cell(50, 8, "DATE DE L'EVENEMENT", 1, 0, 'C', 1);

	// position de la colonne 4 (130 = 70+60)
	$pdf->SetX(160);
	$pdf->Cell(35, 8, 'NOMBRE DE PLACES', 1, 0, 'C', 1);

	$pdf->Ln(); // Retour à la ligne
}
// AFFICHAGE EN-TÊTE DU TABLEAU
// Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (60 mm)
$position_entete = 180;
// police des caractères
$pdf->SetFont('Helvetica', '', 9);
$pdf->SetTextColor(0);
// on affiche les en-têtes du tableau
entete_table($position_entete);


$position_detail = 188; // Position ordonnée = $position_entete+hauteur de la cellule d'en-tête (60+8)
$requete2 = "SELECT * FROM societe_client WHERE id_client='" . $_SESSION["id_client"] . "'";
$result2 = mysqli_query($link, $requete2);
while ($data_visit = mysqli_fetch_array($result2)) {
	// position abcisse de la colonne 1 (10mm du bord)
	$pdf->SetY($position_detail);
	$pdf->SetX(10);
	$pdf->MultiCell(50, 8, utf8_decode($data_visit['nom_client']), 1, 'C');
	// position abcisse de la colonne 2 (70 = 10 + 60)	
	$pdf->SetY($position_detail);
	$pdf->SetX(60);
	$pdf->MultiCell(50, 8, utf8_decode($data_visit['responsable_client']), 1, 'C');

	// position abcisse de la colonne 3 (130 = 70 + 60)	
	$pdf->SetY($position_detail);
	$pdf->SetX(110);
	$pdf->MultiCell(50, 8, utf8_decode($data_visit['date']), 1, 'C');

	// position abcisse de la colonne 4 (130 = 70+ 60)
	$pdf->SetY($position_detail);
	$pdf->SetX(160);
	$pdf->MultiCell(35, 8, $data_visit['nombre_personne'], 1, 'C');
	$pdf->Ln();

	$pdf->MultiCell(75,6, "LE PRIX DE LA RESERVATION DE LA SALLE EN TTC EST DE :  " . $data_salle["price"] . " EUROS", 0, 5);
	// on incrémente la position ordonnée de la ligne suivante (+8mm = hauteur des cellules)	
	$position_detail += 8;
}
mysqli_free_result($result2);

// affichage à l'écran
$pdf->Output('test.pdf', 'I'); 
