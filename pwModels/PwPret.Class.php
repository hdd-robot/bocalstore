<?php
class PwPret extends PwModel {
	const TABLE_NAME = 'pret';
	const TABLE_ID = 'prt_id';
	

	function __construct($i = '') {
		parent::__construct ( $i );
	}
	
	public static function getListEnCoursDePret() {
	    
	    $cmd = "SELECT * FROM pret where prt_date_retour = '' order by prt_date_pret ;";
	    $prep = PwPDO::getInstance ( PwPDO::DB_0 )->prepare ( $cmd );
	    $prep->execute ();
	    $list = $prep->fetchAll ( PDO::FETCH_ASSOC );
	    
	    return $list;
	}
	
	
	public static function getListHistorique() {
	    
	    $cmd = "SELECT * FROM pret where prt_date_retour <> '' order by prt_date_pret ;";
	    $prep = PwPDO::getInstance ( PwPDO::DB_0 )->prepare ( $cmd );
	    $prep->execute ();
	    $list = $prep->fetchAll ( PDO::FETCH_ASSOC );
	    
	    return $list;
	    
	}
	
	public static function getListEnRetard() {
	    
	    $date = date("Y-m-d");
	    
	    $cmd = "SELECT * FROM pret where 
                prt_date_retour = '' and 
                prt_date_retour_prevu < '$date'
                order by prt_date_pret ;";
	    $prep = PwPDO::getInstance ( PwPDO::DB_0 )->prepare ( $cmd );
	    $prep->execute ();
	    $list = $prep->fetchAll ( PDO::FETCH_ASSOC );
	    
	    return $list;
	}

 	
	
	protected  $prt_id = "";
	protected  $prt_user_id ="";
	protected  $prt_prd_id ="";
	protected  $prt_nom ="";
	protected  $prt_prenom ="";
	protected  $prt_email ="";
	protected  $prt_diplome ="";
	protected  $prt_num_tel ="";
	protected  $prt_date_pret ="";
	protected  $prt_date_retour_prevu ="";
	protected  $prt_date_retour ="";
	protected  $prt_commentaire ="";
	
	
	

}









