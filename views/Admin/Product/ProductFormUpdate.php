<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<?php session_start(); ?>
<body>
    <form action="../controllers/Router.php?product=update" method="post" style="width: 50%; margin: auto; padding-top: 100px;">
        <input type="hidden" name="id_product" id="id_product" value="<?= $product["id_product"]; ?>">

        <select name="category" class="form-select" aria-label="Disabled select example">
            <option disabled selected value="<?= $product["category"] ?>"><?= $product["category"] ?></option>
            <option value="Fruit">Fruit</option>
            <option value="Légume">Légume</option>
        </select>

        <div class="form-outline">
            <input name="lastname" value="<?= $product["name_product"] ?>" type="text" id="form3Example1" class="form-control" />
            <label class="form-label" for="form3Example1">Nom</label>
        </div>
        
        <div class="form-outline mb-4">
            <input name="mail" value="<?= $product["type"] ?>" type="text" id="form3Example3" class="form-control" />
            <label class="form-label" for="form3Example3">Type</label>
        </div>
    
        <select name="season" class="form-select" aria-label="Disabled select example">
            <option disabled selected value="<?= $product["season"] ?>"><?= $product["season"] ?></option>
            <option value="Printemps">Printemps</option>
            <option value="Eté">Eté</option>
            <option value="Automne">Automne</option>
            <option value="Hiver">Hiver</option>
        </select>

        <div class="form-outline">
            <input name="picture" value="<?= $product["picture"] ?>" type="file" id="form3Example1" class="form-control" />
            <label class="form-label" for="form3Example1">Photo</label>
        </div>

        <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
            <label class="form-check-label" for="form2Example33">
                J'ai lu et j'accepte les politiques de confidentialés de ce site
            </label>
        </div>

        <div class="submit" style="display: flex;">
            <button type="submit" class="btn btn-primary btn-block mb-4" style="width: 50%; margin:auto;">Envoyer</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>