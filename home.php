<?php
session_start();
//verifico si esta la cookie de recordarme
//ar_dump($_COOKIE); exit;
if(isset($_COOKIE['_log_'])){
    $email=$_COOKIE['_log_'];
    //traigo los datos en mi json
    $usuario = file_get_contents("usuario.json");
    //convierto a array asociativo
    $usuarioEnphp = json_decode($usuario , true);
    $emailRegistrado = $usuarioEnphp["email"];
    if($email == $emailRegistrado){
      //si da true, da la bienvenida
      $_SESSION['email']=$emailRegistrado;
      $_SESSION['nombre']=$usuarioEnphp['nombre'];
    }
}

if(isset($_SESSION['nombre'])){
  echo "Bienvenido {$_SESSION['nombre']}";
}else{
  header("Location:login.php");
}


?><br>
<a href="cerrarsesion.php">cerrar sesion</a>
