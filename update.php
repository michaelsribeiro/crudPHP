<?php 
   include "php/update.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Atualizar Cadastro</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body class="bg-light w-100 d-flex align-items-center justify-content-center" style="height: 100vh ;">

   <div class="bg-white shadow form-login w-50 pt-5 pb-5 d-flex align-items-center justify-content-center flex-column" style="border-radius: 10px;">
      <h3 class="display-4  mb-4">Atualizar Cadastro</h3>     
      <form class="form-group w-50 h-100 d-flex flex-column" action="php/update.php" method="POST">
         <?php
            if($_SESSION['error']){
               echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
               $_SESSION['error'] = '';
            } else if($_SESSION['success']){
               echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
               $_SESSION['success'] = '';
            }
         ?>
         <input class="form-control w-100 mb-3" type="text" name="id" hidden value="<?=$fetch_query['id']?>">
         <label class="form-label" for="name">Nome</label>
         <input class="form-control w-100 mb-3" type="text" name="name" value="<?=$fetch_query['name']?>">
         <label class="form-label" for="email">Email</label>
         <input class="form-control w-100 mb-3" type="email" name="email" value="<?=$fetch_query['email']?>">
         <div class="back-btn d-flex justify-content-between">
            <input class="btn btn-primary align-self-center w-25" name="update" type="submit" value="Enviar">
            <a href="read.php" class="btn btn-success">Voltar</a>
         </div>
      </form>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>