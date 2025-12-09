<?php
    require "../../autoload.php";

    $dao = new EmprestimoDAO();
    $dao->destroy($_GET['id']);

    header('Location: index.php');