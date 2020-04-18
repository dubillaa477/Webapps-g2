<?php
    include_once 'connection.php';

          

        $cedula = $_POST['cedula'];
        $pass = $_POST['password']; 

        $stmt ="SELECT count(*) FROM usuario WHERE id_cedula ='$cedula' AND password_u='$pass'";

        $result = $conn->prepare($stmt);
        $result->execute();
        $numberRows = $result->rowCount();

        if($result = 1){
            header('Location:principal.php');        
        }else{
            header('Location:login.php');
            
        }

        
        
    
    
    /*$gsend = $conn->prepare($sql);
    $gsend->execute();
    $result = $gsend->fetchAll();

    $resultado = mysqli_query($conn, $sql) or die (header('Location:login.php'));*/

    
?>