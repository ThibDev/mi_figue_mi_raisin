<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <?php
  session_start(); 
    var_dump($_SESSION);
    if (isset($erreurs)) {
        var_dump($erreurs);
    }
    ?>

    <body style="background-color: #e5e6e8;">

        <form enctype="multipart/form-data" action="../../../controllers/Router.php?article=create" method="post" style="width: 50%;background-color: white; margin: 50px auto;border-radius: 15px;padding: 10px;">
            <h1 style="font-family: sans-serif; text-align:center; padding-bottom : 15px">Ajout d'article</h1>
            <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION["user"] ?>">
            <div class="form-outline">
                <label class="form-label" for="form3Example1">Titre de l'article</label>
                <input name="title" placeholder="Titre de l'article" type="text" id="form3Example1" class="form-control" />
            </div>
                
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Texte</label>
                <input name="text" placeholder="Texte" type="text" id="form3Example3" required class="form-control" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form4">Photo</label>
                <input name="picture" type="file" required id="form4" class="form-control" /> 
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form4">Date de publication</label>
                <input name="created_at" type="datetime-local" required id="form4" class="form-control" /> 
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