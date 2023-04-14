<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Document</title>
</head>

<body>
<?php session_start(); ?>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titre</th>
                <th scope="col">Texte</th>
                <th scope="col">Photo</th>
                <th scope="col">Auteur</th>
                <th scope="col">Créer le</th>
                <th scope="col">Ajout</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article) : ?>
                <tr>
                    <th style="background-color: whitesmoke; color: black" scope="row"><?= $article["id_article"]; ?></th>
                    <td style="background-color: whitesmoke; color: black"><?= $article["title"]; ?></td>
                    <td style="background-color: whitesmoke; color: black"><?= $article["text"]; ?></td>
                    <td style="background-color: whitesmoke; color: black"><?= $article["picture"]; ?></td>
                    <td style="background-color: whitesmoke; color: black"><?= $article["id_user"]; ?></td>
                    <td style="background-color: whitesmoke; color: black"><?= $article["created_at"]; ?></td>
                    <td style="background-color: whitesmoke; color: black"><a href="../views/Admin/Article/ArticleForm.php?article=create"><i class="fa-solid fa-plus"></i></a></td>
                    <td style="background-color: whitesmoke; color: black"><a href="../controllers/Router.php?article=formUpdate&id_article=<?= $article["id_article"] ?>"><i class="fa-solid fa-pen"></a></i></a></td>
                    <td style="background-color: whitesmoke; color: black"><a href="../controllers/Router.php?article=delete&id_article=<?= $article["id_article"] ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>