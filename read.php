<?php 
    include "php/read.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Listar Cadastros</title>

   <!-- LINKS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


</head>
<body class="bg-light w-100 d-flex align-items-center justify-content-center" style="height: 100vh ;">
   <?php
      session_start();      
   ?>

   <div class="bg-white shadow container w-50 pt-5 pb-5 d-flex align-items-center justify-content-center flex-column" style="border-radius: 10px;">
        <h3 class="display-4 mb-4">Listar Cadastros</h3>
        <div class="box w-75">

        <?php
            if(mysqli_num_rows($result) > 0) { ?>

        <table class="table mb-4">
        <?php
            if($_SESSION['success']){
               echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
               $_SESSION['success'] = '';
            }
         ?>
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i = 0; 
                    while($rows = mysqli_fetch_assoc($result)) { 
                    $i++;
                ?>
                <tr>
                <th scope="row"><?=$i?></th>
                <td><?php echo $rows['name']?></td>
                <td><?php echo $rows['email']?></td>
                <td>
                    <a class="btn btn-warning text-white" href="update.php?id=<?=$rows['id']?>"><i class="fas fa-edit" aria-hidden="true"></i></a>
                    <a class="btn btn-danger text-white" href="php/delete.php?id=<?=$rows['id']?>" onclick="return confirm('Deseja deletar este cadastro?');">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
            <?php } ?>
            <div class="back-btn d-flex justify-content-end">
                <a href="register.php" class="btn btn-success">Novo Cadastro</a>
            </div>
        </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>