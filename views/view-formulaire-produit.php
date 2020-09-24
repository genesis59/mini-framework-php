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
        <div class="form-group">
            <label>Désignation</label>
            <input type="text" class="form-control" name="product_name">
        </div>
        <div class="form-group">
            <label>Catégorie</label>
            <input type="text" class="form-control" name="category">
        </div>
        <div class="form-group">
            <label>Prix</label>
            <input type="number" step="0.01" class="form-control" name="price">
        </div>

        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>