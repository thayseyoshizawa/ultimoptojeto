<?php
    require "../../autoload.php";

    $emprestimo = new Emprestimo();
    $emprestimo->setDataEmprestimo($_POST['dataEmprestimo']);
    $emprestimo->setDataDevolucao($_POST['dataDevolucao']);
    $emprestimo->setId($_POST['id']);

    $dao = new EmprestimoDAO();
    $dao->update($emprestimo);

    header('Location: index.php');