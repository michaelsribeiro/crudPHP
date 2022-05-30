<?php
    session_start();

    if(isset($_GET['id'])){
        include "conection.php";
        
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
    $id = validate($_GET['id']);

    $select_query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

    if(mysqli_num_rows($select_query) > 0){
        $fetch_query = mysqli_fetch_assoc($select_query);
    } else {
        header("Location: read.php");
        exit;
    }

    } else if(isset($_POST['update'])) {
        include "../conection.php";

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $id = validate($_POST['id']);
        $name = validate($_POST['name']);
        $email = validate($_POST['email']);

        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;

        if(empty($_SESSION['name']) || empty($_SESSION['email'])) {
            $_SESSION['error'] = 'Preencha todos os campos!';
            header("Location: ../read.php");
            exit;

        } else {
            $update_query = mysqli_query($conn, "UPDATE users SET name = '$name', email = '$email' WHERE id = '$id'");
            
            if($update_query) {
                $_SESSION['success'] = 'Atualizado com sucesso!';
                header("Location: ../read.php");
                exit;
            } else {
                $_SESSION['error'] = 'Preencha todos os campos!';
                header("Location: ../read.php");
                exit;
            }
        }    

    } else {
        header("Location: read.php");
        exit;
    }
?>