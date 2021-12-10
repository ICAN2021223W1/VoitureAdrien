<?php

class ModeleManager extends Modele {
    /**
     * Recupere les modeles présente une marque
     */

    public function findByMarque(int $id){
		// Connexion auto à la BDD :
		$bdd = new BDD();
		// Récupération de la connexion :
		$connexion = $bdd->getCo();

		$sql = "SELECT * FROM modele WHERE marque = :id";
		// Prépare la requete SQL :
		$req = $connexion->prepare($sql);
		// Execute la requete SQL :
		$req->execute([
			'id' => $id
		]);

		return $req;
	}

    /**
	 * Récupère le nombre d'étudiants dans un modele
	 */
	public function findNbModeles(){
		// Connexion auto à la BDD :
		$bdd = new BDD();
		// Récupération de la connexion :
		$connexion = $bdd->getCo();

		$sql = "SELECT mo.id FROM marque ma INNER JOIN modele e ON mo.marque = c.id WHERE c.id = :id";
		// Prépare la requete SQL :
		$req = $connexion->prepare($sql);
		// Execute la requete SQL :
		$req->execute([
			'id' => $this->getId()
		]);

		return $req;
	}

     public function findAll() {
         //Connexion auto à la BDD : 
         $bdd = new BDD();

         //Récupération de la connexion : 
         $connexion = $bdd->getCo();

         $sql = "SELECT * FROM modele";
         //Prépare la requete SQL : 
         $req = $connexion->prepare($sql);
         //Execute la requete SQL : 
         $req->execute();

         return $req;
     }

    /**
	 * Sauvegarde une modele
	 */
	public function save(){
		// Connexion auto à la BDD :
		$bdd = new BDD();
		// Récupération de la connexion :
		$connexion = $bdd->getCo();

		$sql = "INSERT INTO modele(nom, prix, marque) VALUES (:n, :p, :m);";
		// Prépare la requete SQL :
		$req = $connexion->prepare($sql);
		// Execute la requete SQL :
		$req->execute([
			'n' => $this->getNom(),
            'p' => $this->getPrix(),
			'm' => $this->getMarque()
		]);

		return $req;
	}

     /**
      * Retrouve un modele grace a son id
      */

      public function findOneById($id){
          //Connexion auto a la BDD : 
          $bdd = new BDD();
          //Récupération de la connexion : 
          $connexion = $bdd->getCo();
          $sql = "SELECT * FROM modele WHERE id = :id";
          //Prépare la requete SQL : 
          $req = $connexion->prepare($sql);
          //Execute la requete SQL : 
          $req->execute(['id' => $id]);

          return $req;
      }

	  public function updateModele() {
		// Connexion auto à la BDD :
		$bdd = new BDD();
		// Récupération de la connexion :
		$connexion = $bdd->getCo();

		$sql = "UPDATE marque SET nom = :n WHERE id = :id;";
		// Prépare la requete SQL :
		$req = $connexion->prepare($sql);
		// Execute la requete SQL :
		$req->execute([
			'n' => $this->getNom(),
			'id'=> $this->getId()
		]);

		return $req;
	}
	
	public function deleteModele(){
		// Connexion auto à la BDD :
		$bdd = new BDD();
		// Récupération de la connexion :
		$connexion = $bdd->getCo();

		$sql = "DELETE FROM modele WHERE id = :id;";
		// Prépare la requete SQL :
		$req = $connexion->prepare($sql);
		// Execute la requete SQL :
		$req->execute([
			'id'=> $this->getId()
		]);

		return $req;
	}
}