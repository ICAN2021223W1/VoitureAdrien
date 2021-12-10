<h2>Modèle</h2>
<h3>Ajouter une marque</h3>
<td><?= $modele->getNom(); ?></td>
<td><?= $modele->getPrix(); ?></td>

<h2>Modifier le modele</h2>
<form action="index.php?m=modele_update&modele=<?= $_GET['modele']; ?>" method="POST">
	<label for="nom">Nom :</label>
	<br>
	<input type="text" name="nom" id="nom" value="<?= $modele->getNom(); ?>">
	<br>
	<input type="submit" name="update_marque" value="Mettre à jour" class="btn btn-primary">
</form>

<hr>






