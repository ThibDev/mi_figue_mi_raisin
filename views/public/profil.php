<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Profil de <?=$user["name"]?></h1>
    <a href="../controllers/Router.php?user=logout">Déconnexion</a>
    <a href="../controllers/Router.php?user=readAll">Voir tous les utilisateurs</a>
    <a href="../views/Admin/Product/ProductForm.php">Ajouter un produit</a>
</body>
</html>