<?php
if (isset($_GET['p'])) {
   $route = $_GET['p'];

   $routes = [
      'contacts' => './Views/Contact.php',
      'signup' => './signup.php',
   ];

   $result = $routes[$route];
   require($result);
} else {
?>
   <div class=" d-flex align-items-center d-flex justify-content-center ">

      <img src="./Asset//Image/idea.jpg" class="img-fluid" alt="Sample image">

   </div><?php
      }

         ?>