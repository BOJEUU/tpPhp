<!doctype html>
<html lang="fr">

<head>
  <title>exo6</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
  <?php
  $mess = "";
  $img = "img/";
  if (isset($_FILES["image"])) {
    var_dump($_FILES["image"]);
    if ($_FILES["image"]["size"] < 1000000 && !$_FILES["image"]["error"]) {
      $mime = mime_content_type($_FILES["image"]["tmp_name"]);
      if ($mime == "image/png" || $mime == "image/jpeg") {
        $tmp_name =  $_FILES["image"]["tmp_name"];
        $image = uniqid("", false) . "." . pathinfo($_FILES["image"]["name"])["extension"];
        move_uploaded_file($tmp_name, "$img/$image");
        $mess = "Votre fichier a été sauvegarder";
      } else {
        $mess = "Votre fichier n'est pas une image";
      }
    } else {
      $mess = "Désolé votre fichier doit faire moins de 1 mo";
    }
  }
  $scandir = scandir("img/");
  
    if(count($scandir) > 0){
      $countImg = count($scandir)-2;
    }else{
      $countImg = 0 ;
    }
  foreach ($scandir as $key => $image) {

    if (($image !== ".") and ($image !== ".."))

    {

      echo $image . "<br>\n";
    }
  }
  ?>
  <div class="container-fluid text-center">
    <div class="row d-flex flex-column justify-content-center">
      <div class="col">
        <h1>VEUILLEZ CHOISIR UNE IMAGE</h1>
        <h2><?php echo $mess ?></h2>
        <form action="index.php" method="post" enctype="multipart/form-data">
          <div class="row justify-content-center">
            <div class="col-sm-6">
              <input class="form-control form-control-lg" name="image" id="fileToUpload" type="file">
            </div>
          </div>

          <div class="row pt-5 pb-2">
            <div class="col-6">
              <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
            <div class="col-6">
              <a href="gallery.php" class="btn btn-primary" role="button" aria-pressed="true">Gallerie <?= $countImg ?></a>
            </div>
          </div>
      </div>
      </form>



      <img id="imgPreview">
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="assets/script.js"></script>
  <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</body>

</html>