<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $livro = new Livro();
    $livro->setTitulo($_POST['titulo']);
    $livro->setAnoPublicacao($_POST['anoPublicacao']);
    $livro->setEdicao($_POST['edicao']);

    // Inserir no Banco de Dados
    $dao = new LivroAO();
    $dao->create($livro);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');