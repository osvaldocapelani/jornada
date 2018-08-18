<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "bagdarnm";
    $dbname = "jornada2018";
    
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if($conn->connect_error){
        echo "Falha na conexao ao banco de dados " . $conn->connect_error;
        exit;
    }  
?>