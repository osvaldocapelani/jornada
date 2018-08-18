<?php
    session_save_path('/tmp');
	session_start();
    session_destroy();
    //Redireciona para a página de autenticação
	header('location:index.php');