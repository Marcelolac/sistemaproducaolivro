<?php
    session_start();
    session_destroy();
    unset($_SESSION["usuario_logado"]);
    header("Location: ../index.php");
?>



