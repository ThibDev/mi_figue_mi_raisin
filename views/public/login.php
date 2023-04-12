<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Document</title>
</head>

<body style="background-color: #e5e6e8;">
  

  <form action="../../controllers/Router.php?user=login" method="post" style="width: 50%;background-color: white; margin: 50px auto;border-radius: 15px;padding: 10px;">
    <h1 style="font-family: sans-serif; text-align:center; padding-bottom : 15px">Connexion</h1>
  
    <div class="form-outline mb-4">
      <input name="mail" type="email" id="form2Example1" class="form-control" />
      <label class="form-label" for="form2Example1">Email</label>
    </div>

    <div class="form-outline mb-4">
      <input name="password" type="password" id="form2Example2" class="form-control" />
      <label class="form-label" for="form2Example2">Mot de passe</label>
    </div>

    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
          <label class="form-check-label" for="form2Example31"> Remember me </label>
        </div>
      </div>

      <div class="col">
        <a href="#!">Forgot password?</a>
      </div>
    </div>

    <div class="submit" style="display: flex;">
      <button type="submit" class="btn btn-primary btn-block mb-4" value="Login" style="width: 50%; margin:auto;">Connection</button>
    </div>

  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>