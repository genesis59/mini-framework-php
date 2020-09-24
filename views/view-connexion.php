<div class="col-md-6">
    <h1 class="jumbotron">Connexion</h1>

    <?php if (!empty($error)) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
    <?php endif ?>

    <?php if (!empty($message)) : ?>
    <div class="alert alert-info">
        <?= $message ?>
    </div>
    <?php endif ?>

    <!-- formulaire de connexion -->
    <form method="post">
        <div class="form-group">
            <label>Login</label>
            <input type="email" name="login" placeholder="votre email" class="form-control">
        </div>
        <div class="form-group">
            <label>Login</label>
            <input type="password" name="pwd" placeholder="votre mot de passe" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Valider</button>
    </form>
</div>