<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $emprestimo = new Emprestimo();
    $emprestimo->setDataemprestimo($_POST['dataemprestimo']);
    $emprestimo->setDatadevolucao($_POST['datadevolucao']);

    // Inserir no Banco de Dados
    $dao = new EmprestimoDAO();
    $dao->create($emprestimo);

    // Redirecionar para o index (Comentar quando não funcionar)
    //header('Location: index.php');