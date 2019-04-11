<!DOCTYPE html>
<?php

//verifico qu estoy mandando datos
if ($_POST) {
    echo '<pre>';
    var_dump($_POST); exit;
}

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <h1>Registro</h1>
    <form class="" action="" method="post">
        <div class="">
            <label for="">email</label>
            <input type="email" name="email" value="">
        </div>
        <div class="">
            <label for="">contrasenia</label>
            <input type="password" name="contrasenia" value="">
        </div>
        <div class="">
            Hobbies
            <input type="checkbox" name="deportes[]" id="futbol" value="fut">
            <label for="futbol">Futbol</label>
            <input type="checkbox" name="deportes[]" id="running" value="run">
            <label for="running">Running</label>
            <input type="checkbox" name="deportes[]" id="pintar" value="pint">
            <label for="pintar">Pintar</label>
        </div>
        <div class="">
            <input type="submit" name="" value="enviar">
        </div>
    </form>
  </body>
</html>
