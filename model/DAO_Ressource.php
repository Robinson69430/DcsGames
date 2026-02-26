<?php

class DAO_Ressource {

	private PDO $bdd;


	public function __construct() {
		try {
			$this->bdd = new PDO('mysql:host=localhost;dbname=dcsgames', 'root', '');
		} catch(Exception $e) {
			die('ERROR : '. $e->getMessage());
		}



	}

		public function getRessource() {
		$sql = "
			SELECT consommation.mois, SUM(CASE WHEN ressource.nom = 'Stockage' THEN consommation.volume ELSE 0 END) AS Stockage, SUM(CASE WHEN ressource.nom = 'Réseau' THEN consommation.volume ELSE 0 END) AS Réseau FROM consommation, ressource WHERE consommation.res_id = ressource.res_id GROUP BY consommation.mois ORDER BY consommation.mois;
		";

		$req = $this->bdd->prepare($sql);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
	}
}