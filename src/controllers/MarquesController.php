<?php
    class MarqueController {
        public function list(){
            // Mise en tampon de tout ce qui suit
            ob_start();
    
            $em = new MarqueManager();
            // Récupération de la table 'marque'
            $marques = $em->findAll();
    
            // Je génère un tableau d'objets PHP pour pouvoir faire le foreach
            $liste_marques = $marques->fetchAll(PDO::FETCH_CLASS, 'Marque');
            
            // Récupération de la vue
            require_once 'src/views/marque_list.php';
    
            // Récupération du tampon
            $contenu = ob_get_clean();
            echo $contenu;
        }

        public function save() {
            if(isset($_POST['nom']) && !empty($_POST['nom'])) {

                //Je crée l'objet 'mac' de type 'MarqueManager'
                $mac = new MarqueManager();

                //Je lui assigne les données reçues par le formulaire

                $mac->setNom($_POST['nom']);

                if($mac->save()->rowCount() == 1) {
                    echo "<p class= 'text-success'>Marque Sauvegardée</p>";
                }else {
                    echo "<p class='text-danger'>Une erreur est survenue lors de la sauvegarde";
                }
            }else {
                echo "<p class='text-danger'>Veuillez renseigner tous les champs disponibles";
            }
        }

        public function show(){
            ob_start();

            //Je vérifie que j'ai reçu un id en paramètre et qu'il n 'est pas vide
            if(isset($_GET['marque']) && !empty($_GET['marque'])){
            
                //Je vérifie que la marque existe en base
                $mac= new MarqueManager();
                $marque = $mac->findOneById($_GET['marque']);

                if($marque->rowCount() == 1) {
                    $marque = $marque->fetchObject('Marque');

                    //Je crée l'object 'moc' de type 'ModeleManager'
                    $moc = new ModeleManager();

                    //Je récupère les modeles présentes dans la marque
                    $modeles = $moc->findByMarque($marque->getId());

                    //Appel de la vue

                    require_once 'src/views/marque_show.php';
                }else{
                    echo "<p class='text-danger'>Marque Introuvable</p>";
                }
            }else{
                echo "<p class='text-danger'>Marques Introuvable</p>";
            }

            $contenu = ob_get_clean();
            echo $contenu;
        }
        
        public function deleteMarque(){

            //Je vérifie que j ai recu l'id et qu'il n est pas vide
            if(isset($_GET['marque']) && !empty($_GET['marque'])) {
                // Je crée l'objet 'em' de type 'MarqueManager'
                    $mac = new MarqueManager();

                    // Je vérifie que l'id reçu corresponde bien à une école dans la base
                    $marque = $mac->findOneById($_GET['marque']);
                    // Si j'ai un résultat, c'est que l'école existe en base
                    if($marque->rowCount() == 1){
                        // Je lui assigne les données reçues par le formulaire
                        $mac->setId($_GET['marque']);

                        // Je supprime l'élément et je regarde le nombre de lignes affectées par l'opération
                        if($mac->delete()->rowCount() >= 1){
                            echo "<p class='text-warning'>Marque supprimée.</p>";
                        }
                        else{
                            echo "<p class='text-danger'>Une erreur est survenue lors de la suppression.</p>";
                        }
                    }
                    else{
                        echo "<p class='text-danger'>Marque introuvable.</p>";
                    }
            }

        }

        public function deleteModele() {
            if(isset($_GET['modele']) && !empty($_GET['modele'])) {
                
                // Je crée l'objet 'em' de type 'ModeleManager'
                $moc = new ModeleManager();

                // Je vérifie que l'id reçu corresponde bien à une école dans la base
                $modele = $moc->findOneById($_GET['modele']);
                // Si j'ai un résultat, c'est que l'école existe en base
                if($modele->rowCount() == 1){
                    
                    // Je lui assigne les données reçues par le formulaire
                    $moc->setId($_GET['modele']);
                   
                    // Je supprime l'élément et je regarde le nombre de lignes affectées par l'opération
                    if($moc->deleteModele()->rowCount() >= 1){
                        echo "<p class='text-warning'>Modele supprimée.</p>";
                        
                    }
                    else{
                        echo "<p class='text-danger'>Une erreur est survenue lors de la suppression.</p>";
                    }
                }
                else{
                    echo "<p class='text-danger'>Modele introuvable.</p>";
                }
            }else{
                echo 'ok';
            }
        }

        public function updateMarque() {
                // Je vérifie que j'ai reçu tous les champs et qu'ils ne sont pas vides
            if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['id']) && !empty($_POST['id'])){
                
                // Je crée l'objet 'cm' de type 'MarqueManager'
                $mac = new MarqueManager();
                
                // Je vérifie que l'id reçu par le formulaire corresponde bien à une marque dans la base
                $marque = $mac->findOneById($_POST['id']);
                // Si j'ai un résultat, c'est que la marque existe en base
                if($marque->rowCount() == 1){
                    // Je lui assigne les données reçues par le formulaire
                    $mac->setId($_POST['id'])
                        ->setNom($_POST['nom']);

                    // Je met à jour l'élément et je regarde le nombre de lignes affectées par l'opération
                    if($mac->updateMarque()->rowCount() >= 1){
                        echo "<p class='text-success'>Marque mise à jour.</p>";
                    }
                    else{
                        echo "<p class='text-danger'>Les données sont identiques.</p>";
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

        
    }
?>