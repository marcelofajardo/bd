<?php
   include('../conexion.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   echo '<div class="error">Nombre: '.$user_check.'</div>';
   echo '<div class="error">el usuario es: '.$user_check.'</div>';
   $ses_sql = mysqli_query($db,"select nombre from usuario where nombre = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['nombre'];
   echo '<div class="error">Nombre: '.$login_session.'</div>';
   if(!isset($_SESSION['login_user'])){
      header("location:Login.php");
   }
?> 
