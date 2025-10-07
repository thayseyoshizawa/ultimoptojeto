<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $emprestimo = new Emprestimo();
    $emprestimo->setDataEmprestimo($_POST['dataEmprestimo']);
    $emprestimo->setDataDevolucao($_POST['dataDevolucao']);
    $emprestimo->setId($_POST['id']);

    // Atualizar registro no Banco de Dados
    $dao = new EmprestimoDAO();
    $dao->update($emprestimo);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');