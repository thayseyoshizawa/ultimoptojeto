<?php
require "./../autoload.php";
    $livro = new Livro();
    $livro->setId($_POST['id']);
    $livro->setTitulo($_POST['titulo']);
    $livro->setAnoPublicacao($_POST['anoPublicacao']);
    $livro->setEdicao($_POST['edicao']);

    $categoria = new Categoria();
    $categoria->setId($_POST['categoria_idCategoria']);
    $livro->setCategoria($categoria);

    $editora = new Editora();
    $editora->setId($_POST['editora_idEditora']);
    $livro->setEditora($editora);

    $dao = new LivroDAO();
    $dao->update($livro);
    header('Location: index.php');