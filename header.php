<?php
require_once "basedatos.php";
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <link rel="stylesheet" href="css/style.css">
         <a href="login.php">Iniciar sesión</a> | <a href="register.php"> Registrarse </a> 
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">ECO CLIMATE</a>

         <nav class="navbar">
            <a href="index.php">Inicio</a>
            <a href="about.php">Acerca de nosotros</a>
            <a href="#"> Grupos</a>
            <a href="contact.php">Contacto</a>
            <a href="#">Noticias</a>
         </nav>
         </div>
    <?php
    
  
    ?>
</div>

      </div>
   </div>


</header>