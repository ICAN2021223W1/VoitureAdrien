<?php
    class MarqueController {
        public function list(){
            
            ob_start();
    
            $mac = new MarqueManager();
            
            $marques = $mac->findAll();
    
            
            $liste_marques = $marques->fetchAll(PDO::FETCH_CLASS, 'Marque');
            
            // Récupération de la vue
            require_once 'src/views/marque_list.php';
    
        
            $contenu = ob_get_clean();
            echo $contenu;
        }

        public function save() {
            if(isset($_POST['nom']) && !empty($_POST['nom'])) {

                
                $mac = new MarqueManager();

               

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

            
            if(isset($_GET['marque']) && !empty($_GET['marque'])){
            
                
                $mac= new MarqueManager();
                $marque = $mac->findOneById($_GET['marque']);

                if($marque->rowCount() == 1) {
                    $marque = $marque->fetchObject('Marque');

                   
                    $moc = new ModeleManager();

                    
                    $modeles = $moc->findByMarque($marque->getId());

                

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

           
            if(isset($_GET['marque']) && !empty($_GET['marque'])) {
                
                    $mac = new MarqueManager();

                   
                    $marque = $mac->findOneById($_GET['marque']);
                    
                    if($marque->rowCount() == 1){
                        
                        $mac->setId($_GET['marque']);

                        
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
                
               
                $moc = new ModeleManager();

                
                $modele = $moc->findOneById($_GET['modele']);
                
                if($modele->rowCount() == 1){
                    
                   
                    $moc->setId($_GET['modele']);
                   
                    
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
                
            if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['id']) && !empty($_POST['id'])){
                
                
                $mac = new MarqueManager();
                
                
                $marque = $mac->findOneById($_POST['id']);
               
                if($marque->rowCount() == 1){
                    
                    $mac->setId($_POST['id'])
                        ->setNom($_POST['nom'])
                        ->setPrix($_POST['prix']);

                    
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