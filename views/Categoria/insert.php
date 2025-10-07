<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $categoria = new Categoria();
    $categoria->setCategoria($_POST['categoria']);

    // Inserir no Banco de Dados
    $dao = new CategoriaDAO();
    $dao->create($categoria);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');