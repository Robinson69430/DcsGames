<?php
class DAO_Application{

    private $bdd;

    public function __construct() {
        try {
            $this->bdd = new PDO(
                'mysql:host=localhost;dbname=campus_it',
                'campus_user',
                'jojo'
            );
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getTopApplications() {

        $sql = "
            SELECT application.nom, SUM(consommation.volume) AS total 
            FROM application 
            JOIN consommation ON application.app_id = consommation.app_id 
            GROUP BY application.app_id 
            ORDER BY total DESC
			LIMIT 5
        ";

        $req = $this->bdd->prepare($sql);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}


