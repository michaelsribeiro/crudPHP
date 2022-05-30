<?php  
    session_start();

    if(isset($_GET['id'])){
        include "../conection.php";
        
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $id = validate($_GET['id']);

        $sql = "DELETE FROM `users` WHERE id = '$id'" or die('A consulta falhou!');
        $result = mysqli_query($conn, $sql);

        if($result) {
            $_SESSION['success'] = 'Deletado com sucesso!';
            header("Location: ../read.php");
            exit;
        }

        header("Location: ../read.php");
     } else {
        header("Location: ../read.php");
     }
?>