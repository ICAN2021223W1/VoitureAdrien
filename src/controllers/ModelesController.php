<?php
    class ModelesController {
        public function list() {
            //Mise en tampon de tout ce qui suit

            ob_start();

            $mac = new MarqueManager();

            //Récupération de la table 'marque'

            $marques = $mac->findAll();

            //Je génére un tableau d'objects PHP pour pouvoir faire le foreach

            $liste_marques = $marque->fetchAll()(PDO::FETCH_CLASS, 'Marque');

            //Récupération de la vue

            require_once 'src/views/marque_list.php';

            //Récupération du tampon
            $contenu = ob_get_clean();
            echo $contenu;

        }

       /**
	 * Sauvegarde un modèle
	 */
	public function save(){
		// Je vérifie que j'ai reçu tous les champs et qu'ils ne sont pas vides
		if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prix']) && !empty($_POST['prix'])){
			
			// Je vérifie que l'école reçu du formulaire corresponde bien à une école dans la base
			$ma = new MarqueManager();
			$marque = $ma->findOneById($_POST['marque']);
			// Si j'ai une correspondance dans la base
			if($marque->rowCount() == 1){
				// Je crée mon objet
				$cm = new ModeleManager();
				// Je lui assigne les valeurs reçues par le formulaire
				$cm->setNom($_POST['nom'])
                    ->setPrix($_POST['prix'])
					->setMarque($_POST['marque']);

				// Je le sauvegarde en base
				if($cm->save()->rowCount() == 1){
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
                $mo = new ModeleManager();
                $modele = $mo->findOneById($_GET['modele']);
                

                if($modele->rowCount() == 1){
                    // Je la transforme en objet PHP
                    $modele = $modele->fetchObject('Modele');
                    
                    // Je crée l'objet 'em' de type 'EtudiantManager'
                    $mo = new ModeleManager();
                    
            


                    // Je récupère les modeles présentes dans la marque
                    //$modeles = $mo->findByMarque($marque->getId());
                    

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
                // Je crée l'objet 'cm' de type 'ModeleManager'
			$cm = new ModeleManager();

			// Je vérifie que l'id reçu par le formulaire corresponde bien à une modele dans la base
			$modele = $cm->findOneById($_POST['id']);
			// Si j'ai un résultat, c'est que la modele existe en base
			if($modele->rowCount() == 1){
				// Je lui assigne les données reçues par le formulaire
				$cm->setId($_POST['id'])
					->setPromo($_POST['promo']);

				// Je met à jour l'élément et je regarde le nombre de lignes affectées par l'opération
				if($cm->update()->rowCount() >= 1){
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