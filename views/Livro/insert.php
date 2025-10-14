<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $livro = new Livro();
    $livro->setTitulo($_POST['titulo']);
    $livro->setAnoPublicacao($_POST['anoPublicacao']);
    $livro->setEdicao($_POST['edicao']);

    $categoria= new Categoria();
    $categoria->setId($_POST['categoria']);

    $livro->setCategoria($categoria);

    $editora= new Editora();
    $editora->setId($_POST['editora']);

    $livro->setEditora($editora);

    // Inserir no Banco de Dados
    $dao = new LivroDAO();
    $dao->create($livro);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');