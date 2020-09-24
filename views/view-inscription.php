<div class="col-md-8 col-lg-6">
    <h1>Inscription des utilisateurs</h1>

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
            <label>Nom</label>
            <input type="text" name="user_name" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="user_email" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirmation de l'email</label>
            <input type="email" name="user_email_confirm" class="form-control">
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="user_password" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirmation du mot de passe</label>
            <input type="password" name="user_password_confirm" class="form-control">
        </div>

        <button type="submit" class="btn btn-success btn-block">
            Valider
        </button>
    </form>
</div>