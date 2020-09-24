<div class="col-md-8">
    <h1><?= $pageTitle ?></h1>

    <!-- Affichage des erreurs -->
    <?php if (count($errors) > 0) : ?>
    <ul class="alert alert-danger">
        <?php foreach ($errors as $message) : ?>
        <li><?= $message ?></li>
        <?php endforeach ?>
    </ul>
    <?php endif ?>

    <form method="post">
        <?php if(isset($_GET["id"])): ?>
        <div class="form-group">
            <input type="number" class="form-control" name="id" value="<?= $_GET["id"] ?>" hidden>
        </div>
        <?php endif ?>
        <div class="form-group">
            <label>Titre</label>
            <input type="text" class="form-control" name="titre">
        </div>
        <div class="form-group">
            <label>Date de parution</label>
            <input type="date" class="form-control" name="dateParution">
        </div>
        <div class="form-group">
            <label>Auteur</label>
            <input type="text" class="form-control" name="auteur">
        </div>
        <div class="form-group">
            <label>Nombre de pages</label>
            <input type="number" class="form-control" name="nbPages">
        </div>

        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>