<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $categoria = new Categoria();
    $categoria->setCategoria($_POST['categoria']);
    $categoria->setId($_POST['id']);


    // Atualizar registro no Banco de Dados
    $dao = new CategoriaDAO();
    $dao->update($categoria);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');