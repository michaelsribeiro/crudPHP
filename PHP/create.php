<?php
    session_start();

    if(isset($_POST['create'])) {
        include "../conection.php";

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $name = validate($_POST['name']);
        $email = validate($_POST['email']);

        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
    }

    if(empty($_SESSION['name']) || empty($_SESSION['email'])) { 

        $_SESSION['error'] = 'Preencha todos os campos!';
        header("Location: ../register.php");
        exit;
        
    } else {
        $sql = "INSERT INTO users(name, email) VALUES('$name', '$email')";
        $result = mysqli_query($conn, $sql);

        if($result) {
            $_SESSION['success'] = 'Cadastro realizado com sucesso!';
            header("Location: ../register.php");
            exit;
        } else {
            $_SESSION['error'] = 'Unknown error occurred!';
            header("Location: ../register.php");
            exit;
        }        
    }
?>