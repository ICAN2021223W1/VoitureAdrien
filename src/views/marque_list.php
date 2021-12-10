<h2>Marques</h2>
<h3>Ajouter une marque</h3>

<?php

	
	// S'il y a des résultats, on affiche le tableau
	if($marques->rowCount() > 0){
		?>
		<table class="table">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// Je parcours ce tableau PHP
					foreach ($liste_marques as $marque) {
						?>
						<tr>
							<td><?= $marque->getNom(); ?></td>
							<td>
								<a href="index.php?m=marque_show&marque=<?= $marque->getId(); ?>" class="btn btn-dark mt-3">Afficher</a>
								<a href="index.php?m=marque_delete&marque=<?= $marque->getId(); ?>" class="btn btn-outline-dark mt-3">Supprimer</a>
					
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
		<?php
	}
	else{
		echo "<p>Il n'y a aucune marque</p><hr>";
	}
?>

<form action="index.php?m=marque_insert" method="POST">
	<label for="nom">Nom :</label>
	<br>
	<input type="text" name="nom" id="nom">
	<br>
	<input type="submit" name="ajout_marque" value="Ajouter" class="btn btn-dark mt-3">
</form>




