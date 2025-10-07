<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $pessoa = new Pessoa();
    $pessoa->setNome($_POST['nome']);

    // Inserir no Banco de Dados
    $dao = new PessoaDAO();
    $dao->create($pessoa);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');