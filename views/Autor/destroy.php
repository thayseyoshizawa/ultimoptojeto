<?php
    require "../../autoload.php";

    $dao = new AutorDAO();
    $dao->destroy($_GET['id']);

    header('Location: index.php');