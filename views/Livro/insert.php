<?php
    require "../../autoload.php";

    // Construir o objeto do Produto
    $livro = new Livro();
    $livro->setTitulo($_POST['titulo']);
    $livro->setAnoPublicacao($_POST['anoPublicacao']);


    $Categoria = new Categoria();
    $Categoria->setId($_POST['categoria']);
    $livro->setCategoria($Categoria);

    $Editora = new Editora();
    $Editora->setId($_POST['editora']);
    $livro->setEditora($Editora);

    $dao = new LivroDAO();
    $dao->create($livro);


    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');