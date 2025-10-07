<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $editora = new Editora();
    $editora->setNome($_POST['nome']);
    $editora->setEndereco($_POST['endereco']);

    // Inserir no Banco de Dados
    $dao = new EditoraDAO();
    $dao->create($editora);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');