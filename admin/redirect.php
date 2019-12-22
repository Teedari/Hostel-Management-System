<?php session_start(); ?>
<?php

    if($_SESSION['user_role'] == 'Admin'){

    header("Location: administrator");
    }
    
    if($_SESSION['user_role'] == 'User'){

        header("Location: user");
    }
?>
