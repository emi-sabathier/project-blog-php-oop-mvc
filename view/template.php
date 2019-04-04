<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Un billet simple pour l'Alaska -
        <?= $title ?>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=un6psb60cfyj1tbk6h05mqrroi6vz31e7vrb5wpefkx4o9uy">
    </script>
    <script>
        tinymce.init({
            selector: '#postArea',
            height: 300,
        });
    </script>
</head>

<body class="bg-dark">

    <div class="menu-btn">
        <a class="btn-open"></a>
    </div>
    <div class="nav">
        <div class="menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php if (isset($_SESSION['role'])) : ?>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "1"): ?>
                        <li><a href="index.php?action=adminPanel">Administration</a></li>
                    <?php endif;?>                
                    <li><a href="index.php?action=disconnect">Déconnexion</a></li>
                <?php else : ?>
                    <li><a href="index.php?action=signup">Inscription</a></li>
                    <li><a href="index.php?action=signin">Identification</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark">
            <div class="text-white text-center mx-auto">
                <div class="row">
                    <div class="col-md-6 my-auto logo-title">
                        Billet simple pour
                    </div>
                    <div class="col-md-6 alaska">
                        l'Alaska.
                    </div>

                </div>
            </div>
        </nav>
        <div class="cards-bg">
            <?=$content?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="public/js/reportComment.js"></script>
    <script src="public/js/menu.js"></script>
</body>

</html>