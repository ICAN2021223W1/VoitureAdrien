<?php
    class ModelesController {
        public function list() {
            

            ob_start();

            $mac = new MarqueManager();

           
            $marques = $mac->findAll();

            

            $liste_marques = $marque->fetchAll()(PDO::FETCH_CLASS, 'Marque');

           

            require_once 'src/views/marque_list.php';

            
            $contenu = ob_get_clean();
            echo $contenu;

        }

       /**
	 * Sauvegarde un modèle
	 */
	public function save(){
		
		if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prix']) && !empty($_POST['prix'])){
			
			
			$mac = new MarqueManager();
			$marque = $mac->findOneById($_POST['marque']);
			
			if($marque->rowCount() == 1){
				
				$moc = new ModeleManager();
				// Je lui assigne les valeurs reçues par le formulaire
				$moc->setNom($_POST['nom'])
                    ->setPrix($_POST['prix'])
					->setMarque($_POST['marque']);

				// Je le sauvegarde en base
				if($moc->save()->rowCount() == 1){
					echo "<p class='text-success'>Modele sauvegardée.</p>";
				}
				else{
					echo "<p class='text-danger'>Une erreur est survenue lors de la sauvegarde.</p>";
				}
			}
			else{
				echo "<p class='text-danger'>Marque introuvable.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>Veuillez renseigner tous les champs du formulaire.</p>";
		}
	}

        public function show(){
            ob_start();

            // Je vérifie que j'ai reçu un id en paramètre et qu'il n'est pas vide
            if(isset($_GET['modele']) && !empty($_GET['modele'])){

                // Je vérifie que la modèle existe en base
                $moc = new ModeleManager();
                $modele = $moc->findOneById($_GET['modele']);
                

                if($modele->rowCount() == 1){
                    // Je la transforme en objet PHP
                    $modele = $modele->fetchObject('Modele');
                    
                    // Je crée l'objet 'em' de type 'EtudiantManager'
                    $moc = new ModeleManager();
                    
            


                    
                    

                    require_once 'src/views/modele_show.php';
                }
                else{
                    echo "<p class='text-danger'>Marque introuvable2.</p>";
                }
            }
            else{
                echo "<p class='text-danger'>Marque introuvable3.</p>";
            }

            $contenu = ob_get_clean();
            echo $contenu;
        }

        public function update() {
            if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prix']) && !empty($_POST['prix']) && isset($_POST['id']) && !empty($_POST['id'])){
                
			$moc = new ModeleManager();

			
			$modele = $moc->findOneById($_POST['id']);
			
			if($modele->rowCount() == 1){
				
				$moc->setId($_POST['id'])
					->setNom($_POST['nom'])
					->setPrix($_POST['prix']);

				
				if($moc->updateModele()->rowCount() >= 1){
					echo "<p class='text-success'>Modele mise à jour.</p>";
				}
				else{
					echo "<p class='text-danger'>Les données sont identiques.</p>";
				}
			}
			else{
				echo "<p class='text-danger'>Modele introuvable.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>Veuillez renseigner tous les champs du formulaire.</p>";
		}
    
        }

        
    }
?>