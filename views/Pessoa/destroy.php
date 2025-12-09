<?php
    require "../../autoload.php";

    $dao = new PessoaDAO();
    $dao->destroy($_GET['id']);

    header('Location: index.php');