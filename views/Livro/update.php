<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $livro = new Livro();
    $livro->setTitulo($_POST['titulo']);
    $livro->setAnoPublicacao($_POST['anoPublicacao']);
    $livro->setEedicao($_POST['edicao']);
    $livro->setId($_POST['id']);

    // Atualizar registro no Banco de Dados
    $dao = new LivroAO();
    $dao->update($livro);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');