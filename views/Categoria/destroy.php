<?php
    require "../../autoload.php";

    $dao = new CategoriaDAO();
    $dao->destroy($_GET['id']);

    header('Location: index.php');