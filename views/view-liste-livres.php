<div class="container">
    <h1>Liste des livres</h1>
</div>


<div class="col-md-8">


    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>Titre</th>
                <th>Date de parution</th>
                <th>Auteur</th>
                <th>Nombre de pages</th>
                <th></th>
                <th><a href="index.php?c=formulaire-livre" class="btn btn-primary">Ajouter un livre</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listBook as $book) : ?>
            <tr>
                <td><?= $book->getTitre() ?></td>
                <td><?= $book->getDateParution() ?></td>
                <td><?= $book->getAuteur() ?></td>
                <td><?= $book->getNbPages() ?></td>
                <td>
                    <a href="index.php?c=formulaire-livre&id=<?= $book->getId() ?>" class="btn btn-secondary"> Modifier
                    </a>
                </td>
                <td>
                    <a href="index.php?c=suppression-livre&id=<?= $book->getId() ?>" class="btn btn-danger"> Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>