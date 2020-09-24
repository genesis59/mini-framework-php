<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? "Page sans titre" ?></title>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

</head>

<body class="container-fluid">

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <a class="navbar-brand" href="/index.php?c=home">My App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item <?= $controller == "home" ? "active" : "" ?>">
                    <a class="nav-link" href="/index.php?c=home">Home</a>
                </li>
                <li class="nav-item <?= $controller == "liste-livres" ? "active" : "" ?>">
                    <a class="nav-link" href="/index.php?c=liste-livres">Liste des livres</a>
                </li>

                <?php if (isset($currentUser["id"])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?c=deconnexion">Déconnexion</a>
                </li>
                <?php else : ?>
                <li class="nav-item <?= $controller == "connexion" ? "active" : "" ?>">
                    <a class="nav-link" href="/index.php?c=connexion">Connexion</a>
                </li>
                <li class="nav-item <?= $controller == "inscription" ? "active" : "" ?>">
                    <a class="nav-link" href="/index.php?c=inscription">Inscription</a>
                </li>
                <?php endif ?>          
                    <li class="navbar-text ml-5">
                        Bonjour <?= $currentUser["user_name"] ?>
                    </li>  
            </ul>
        </div>
    </nav>
    <div class="row mt-4 justify-content-center">
        <?php include VIEW_PATH . $page . ".php" ?>
    </div>

</body>

</html>