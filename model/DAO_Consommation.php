<?php


class DAO_Consommation {

	private PDO $bdd;


    public function __construct() {
        try {
            $this->bdd = new PDO(
                'mysql:host=localhost;dbname=dcsgames',
                'root',
                ''
            );
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

		

	
	public function getConso() {
		$sql = "
			SELECT mois, SUM(volume) AS total 
			FROM consommation  
			GROUP BY mois 
			ORDER BY mois;
		";

		$req = $this->bdd->prepare($sql);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
	}
}