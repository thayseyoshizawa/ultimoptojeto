<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $emprestimo = new Emprestimo();
    $emprestimo->setDataEmprestimo($_POST['dataEmprestimo']);
    $emprestimo->setDataDevolucao($_POST['dataDevolucao']);

    // Inserir no Banco de Dados
    $dao = new EmprestimoDAO();
    $dao->create($emprestimo);

    // Redirecionar para o index (Comentar quando não funcionar)
    //header('Location: index.php');