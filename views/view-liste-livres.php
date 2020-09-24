<h1>Liste des livres</h1>

<div class="col-md-8">

    <div class="mt-3 mb-2">
        <a href="index.php?c=formulaire-produit" class="btn btn-primary">Nouveau produit</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date de parution</th>
                <th>Auteur</th>
                <th>Nombre de pages</th>
                <th></th>
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
                    <a href="index.php?c=suppression-livre&id=<?= $book->getId() ?>" class="btn btn-danger"> Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>