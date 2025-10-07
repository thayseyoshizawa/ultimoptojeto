<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $pessoa = new Pessoa();
    $pessoa->setNome($_POST['nome']);
    $pessoa->setId($_POST['id']);

    // Atualizar registro no Banco de Dados
    $dao = new PessoaDAO();
    $dao->update($pessoa);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');