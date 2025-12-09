<?php
    require "../../autoload.php";

    $emprestimo = new Emprestimo();
    $emprestimo->setDataemprestimo($_POST['dataemprestimo']);
    $emprestimo->setDatadevolucao($_POST['datadevolucao']);

    $dao = new EmprestimoDAO();
    $dao->create($emprestimo);

    //header('Location: index.php');