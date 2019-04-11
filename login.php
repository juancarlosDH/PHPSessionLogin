<!DOCTYPE html>
<?php
session_start();

//verifico si esta la cookie de recordarme
if(isset($_COOKIE['_log_'])){
    $email=$_COOKIE['_log_'];
    //traigo los datos en mi json
    $usuario = file_get_contents("usuario.json");
    //convierto a array asociativo
    $usuarioEnphp = json_decode ($usuario , true);
    $emailRegistrado = $usuarioEnphp["email"];
    if($email == $emailRegistrado){
      //si da true, da la bienvenida
      $_SESSION['email']=$emailRegistrado;
      $_SESSION['nombre']=$usuarioEnphp['nombre'];
  }
}
//verifico que esta logueado
if (isset($_SESSION['nombre'])){
  header('location:home.php');
}

//verifico qu estoy mandando datos
if ($_POST) {
    var_dump($_POST); exit;
  //guardo los datos que recibo de formulario
  $email = $_POST['email'];
  $contrasenia = $_POST['contrasenia'];
  //traigo los datos en mi json
  $usuario = file_get_contents("usuario.json");
  //convierto a array asociativo
  $usuarioEnphp = json_decode ($usuario , true);

  //tomo los datos del json para comparar
  $emailRegistrado = $usuarioEnphp["email"];
  $contraseniaRegistrada = $usuarioEnphp["contrasenia"];
  //comparo la validacion de la contraseñarra
  //y si los emails son iguales
  if(password_verify($contrasenia, $contraseniaRegistrada)&& $email ==$emailRegistrado){
    //si da true, da la bienvenida
    $_SESSION['email']=$emailRegistrado;
    $_SESSION['nombre']=$usuarioEnphp['nombre'];
    //si checkeamos Recordarme lo guardo en una cookie
    if(isset($_POST['recordarme'])){
        setcookie('_log_', $emailRegistrado, time()+60*60*24*30*3);
    }
    header("Location:home.php");
  }else{
    //sino avisa que hay error
    echo "usuario y/o contraseña incorrecta";
  }


}

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <h1>Login</h1>
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
            <input type="checkbox" name="recordarme" id="recordarme">
            <label for="recordarme">Recordarme</label>
        </div>
        <div class="">
            <input type="submit" name="" value="enviar">
        </div>
    </form>
  </body>
</html>
