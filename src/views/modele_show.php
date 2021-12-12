<h2>Modèle</h2>
<h3>Ajouter une marque</h3>
<td><p>Nom de la marque : <?= $modele->getNom(); ?></p></td>
<td><p>Prix du Modèle : <?= $modele->getPrix()."€"; ?></p></td>

<h2>Modifier le modele</h2>
<form action="index.php?m=modele_update&modele=<?= $_GET['modele']; ?>" method="POST">
	<input type="hidden" name="id" value="<?= $modele->getId(); ?>">
	<label for="nom">Nom :</label>
	<br>
	<input type="text" name="nom" id="nom" value="<?= $modele->getNom(); ?>">
	<br>
	<input type="text" name="prix" id="prix" value="<?= $modele->getPrix(); ?>">
	<br>
	<input type="submit" name="update_marque" value="Mettre à jour" class="btn btn-dark mt-3">
</form>

<hr>






