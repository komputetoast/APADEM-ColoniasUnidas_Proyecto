<?php
    if(isset($_POST['icnSesion'])){
        $txtEmail = $_POST['email'];
        $txtPassword = md5($_POST['password']);
    }
?>