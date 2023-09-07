<?php

// session de connecter
session_start ();
echo $_SESSION['nom'];
echo $_SESSION['id'];
$id= $_POST['id_salle'];


// Connexion à la BDD 
$mysqli = mysqli_connect('localhost', 'root', '', 'team_events');


$requete = "SELECT * FROM salle, client, reserver ";
$result = $mysqli->query($requete);

while ($r = mysqli_fetch_array($result)) {
   $info = $r;
}
mysqli_free_result($result);

//$info : prend tt les données des 3 tables

// Appel de la librairie FPDF
require('fpdf.php');
ob_start();

$pdf = new FPDF();
$pdf->AddPage();

{
//header :
$pdf->Image('logo.png',10,6,30);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(80);
$pdf->Cell(30,10,'Voici votre devis personalise :) !',0,0,'C');
$pdf->Cell(20);

}
{
  // corps du devis
  $pdf->SetFont('Arial','B',10);
// saut de ..
$pdf ->Ln(20);
//info client
$pdf->Cell(50,5,'Information client:',0,'L');
$pdf->Ln();
$pdf->Cell(50, 5, 'Nom societé : ',);
$pdf->Cell(55, 5, ($info['nom_societe']));
$pdf->Ln();
$pdf->Cell(50, 5, 'Nom contact: ',);
$pdf->Cell(50, 5, ($info['nom_contact_societe']));
$pdf->Ln();
$pdf->Cell(50, 5, 'Mail contact : ',);
$pdf->Cell(50, 5, ($info['mail_contact_societe']));
$pdf->Ln();
$pdf->Cell(50, 5, 'Numéro : ',);
$pdf->Cell(50, 5, ($info['num_societe']));
$pdf->Ln();

// saut de ..
$pdf ->Ln(20);
//info salle
$pdf->Cell(50,5,'Information Salle:',0,'L');
$pdf->Ln();
$pdf->Cell(50, 5, 'Type de Salle : ',);
$pdf->Cell(50, 5, ($info['nom_salle']));
$pdf->Ln();
$pdf->Cell(50, 5, 'Lieu de la salle: ',);
$pdf->Cell(50, 5, ($info['lieu_salle']));
$pdf->Ln();
$pdf->Cell(50, 5, 'Nom contact : ',);
$pdf->Cell(50, 5, ($info['nom_contact_salle']));
$pdf->Ln();
$pdf->Cell(50, 5, 'Mail du contact : ',);
$pdf->Cell(50, 5, ($info['mail_contact_salle']));
$pdf->Ln();
$pdf->Cell(50, 5, 'Numéro salle: ',);
$pdf->Cell(50, 5, ($info['tel_salle']));
$pdf->Ln();
$pdf->Cell(50, 5, 'Description salle: ',);
$pdf->MultiCell(0, 5, ($info['description_salle']));


$pdf ->Ln(20);     
}

//calcul
$prix=$info["tarif"];
$quantite=$info["nbr_personnes"];
$montant = $quantite*$prix;
$totalTT = $montant*'1.2';
$comission = $prix*'15'/'100';
$tva = '20';

$pdf->Cell(75,6, "Nombre de personne:  " . $quantite . " personnes", 1, 0);
$pdf->Cell(75,6, "Prix par personne:  " . $prix . " euros", 1, 50);


$pdf->Cell(75,6, "Le montant total HT est de :  " . $montant . " EUROS", 0, 50);
$pdf->Cell(75,6, "Le montant de la comission est :  " . $comission . " EUROS", 0, 5);
$pdf->Cell(75,6, "Le montant de la tva est :  " . $tva . " %", 0, 5);
$pdf->Cell(75,6, "Le montant total TTC est de :  " . $totalTT . " EUROS", 0, 5);



   
// affichage à l'écran

$pdf->Output('test.pdf', 'I'); 
ob_end_flush(); 

?>