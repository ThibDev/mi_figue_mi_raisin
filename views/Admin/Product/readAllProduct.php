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

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Nom</th>
                <th scope="col">Type</th>
                <th scope="col">Saison</th>
                <th scope="col">Photo</th>
                <th scope="col">Détails</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($products as $product) : ?>
                <tr>
                    <th style="background-color: whitesmoke; color: black" scope="row"><?= $product["id_product"]; ?></th>
                    <td style="background-color: whitesmoke; color: black"><?= $product["category"]; ?></td>
                    <td style="background-color: whitesmoke; color: black"><?= $product["name_product"]; ?></td>
                    <td style="background-color: whitesmoke; color: black"><?= $product["type"]; ?></td>
                    <td style="background-color: whitesmoke; color: black"><?= $product["season"]; ?></td>
                    <td style="background-color: whitesmoke; color: black"><?= $product["picture"]; ?></td>
                    <td style="background-color: whitesmoke; color: black"><a href="../controllers/Router.php?product=read&id_product=<?= $product["id_product"] ?>">Voir Détails</a></td>
                    <td style="background-color: whitesmoke; color: black"><a href="../controllers/Router.php?product=formUpdate&id_product=<?= $product["id_product"] ?>"><i class="fa-solid fa-pen"></a></i></a></td>
                    <td style="background-color: whitesmoke; color: black"><a href="../controllers/Router.php?product=delete&id_product=<?= $product["id_product"] ?>"><i class="fa-solid fa-trash-can"></i></a></td>
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