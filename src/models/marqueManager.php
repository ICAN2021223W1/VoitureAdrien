<?php
    class MarqueManager extends Marque{
        /**
         * Récupère toute la table 'marque'
         */

         public function findAll(){
             //Connexion auto à la BDD:
             $bdd = new BDD();

             //Récupération de la connexion:
             $connexion = $bdd->getCo();

             $sql = "SELECT * FROM marque";
             //Prépare la requête SQL : 
             $req = $connexion->prepare($sql);
             //Execute la requete SQL : 
             $req->execute();
             return $req;
         }

         public function save() {
             //Connexion auto à la BDD : 
             $bdd = new BDD();
             //Récupération de la connexion : 
             $connexion = $bdd->getCo();

             $sql = "INSERT INTO marque(nom) VALUES (:n);";

             //Prépare la requete SQL : 
             $req = $connexion->prepare($sql);
             //Execute la requete SQL : 
             $req->execute([
                 'n' => $this->getNom(),
             ]);
             return $req;
         }

         public function findOneById($id){
             $bdd = new BDD();
             //Récupération de la connexion : 
             $connexion = $bdd->getCo();

             $sql = "SELECT * FROM marque WHERE id = :id";

             //Prépare la requete SQL : 

             $req = $connexion->prepare($sql);

             //Execute la requete SQL : 

             $req->execute(['id' => $id]);

             return $req;
         }

         public function delete(){
            // Connexion auto à la BDD :
            $bdd = new BDD();
            // Récupération de la connexion :
            $connexion = $bdd->getCo();
    
            $sql = "DELETE FROM marque WHERE id = :id;";
            // Prépare la requete SQL :
            $req = $connexion->prepare($sql);
            // Execute la requete SQL :
            $req->execute([
                'id'=> $this->getId()
            ]);
    
            return $req;
        }

       

        public function updateMarque() {
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

        


    }
?>