<?php
class urbPossPdfController extends PwController {
	protected $checkConnexion = true;
	
	/**
	 * Exécuté à chque appel du controleur
	 */
	public function actionInit() {
		self::printResAttest ($_SESSION ['PwGet'][2]);
		exit ();
	}
	
	/**
	 * avant affichage
	 */
	public function actionBeforDisplay() {
	}
	
	/**
	 * Après affichage
	 */
	public function actionAfterDisplay() {
	}
	
	
	private function printResAttest($pid) {
		
		
		$obj = new PwPossession($pid);
		
		
		
		$pdf = new PwPDF ( 'P', 'mm', 'A4' );
		$pdf->AliasNbPages ();
		$pdf->AddPage ();
		$pdf->Ln ( 30 );
		$pdf->SetFont ( 'arial', '', 25 );
		$pdf->Cell ( 0, 10, utf8_decode("Act de Possession"), 0, 0, 'C' );
		
		$pdf->Ln ( 5 );
		$pdf->Ln ();
		$pdf->SetFont ( 'Arial', '', 15);
		
		$pdf->Ln ( 15 );
	
		$pdf->Cell ( 60, 10, "      Nom :", 0 );  $pdf->Cell ( 30, 10, utf8_decode($obj->pos_nom), 0 );  
		$pdf->Ln ();
		$pdf->Cell ( 60, 10, "      Nom JF :", 0 );  $pdf->Cell ( 30, 10, utf8_decode($obj->pos_nom_jf), 0 );
		$pdf->Ln ();
		$pdf->Cell ( 60, 10, utf8_decode("      Prénom :"), 0 );  $pdf->Cell ( 30, 10, utf8_decode($obj->pos_prenom), 0 );
		$pdf->Ln ();
		$pdf->Cell ( 60, 10, "      Date de naissance :", 0 );  $pdf->Cell( 30, 10, $obj->pos_ddn, 0 );
		$pdf->Ln (); 
		$pdf->Cell ( 60, 10, "      Adresse :", 0 );  $pdf->Cell ( 30, 10, utf8_decode($obj->pos_adresse), 0 );
		$pdf->Ln ();
		
		$pdf->Output ();
	}
}