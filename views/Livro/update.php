<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $livro = new Livro();
    $livro->setTitulo($_POST['titulo']);
    $livro->setAnoPublicacao($_POST['anoPublicacao']);
    $livro->setEdicao($_POST['edicao']);
    $livro->setId($_POST['id']);

    $categoria= new Categoria();
    $categoria->setId($_POST['categoria']);

    $livro->setCategoria($categoria);

    $editora= new Editora();
    $editora->setId($_POST['editora']);

    $livro->setEditora($editora);

    // Atualizar registro no Banco de Dados
    $dao = new LivroDAO();
    $dao->update($livro);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');