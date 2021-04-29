<?php
        session_start();

        $user = "";
        $password = "";
        $errors = array();

        if(isset($_POST['user'])){
            if(!empty($_POST['user'])){
                $user = $_POST['user'];
            }else{
                $errors = 1;
            }
        }else{
           $errors = $errors;
        }

        if(isset($_POST['password'])){
           if(!empty($_POST['password'])){
                $password = $_POST['password'];
            }else{
                $errors = 1;
            }
        }else{
           $errors = $errors;
        }

        $_SESSION['user'] = $user;
        $_SESSION['password'] = $password;

        //TEST: Check if user is --> LAURA 123456 or LUIS 567899
        if((($user == "LAURA") && ($password == "123456")) || (($user == "LUIS") && 
           ($password == "567899"))){
            $data = "OK";
            echo $data;
            //header("location: ../loginSuccess.php");
        }else{
            $data = "ERROR";
            echo $data;
            //echo "No se encontró usuario";
            //header("location: ../loginFail.php");
        }
    ?>