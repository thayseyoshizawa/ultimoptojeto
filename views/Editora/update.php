<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $editora = new Editora();
    $editora->setNome($_POST['nome']);
    $editora->setEndereco($_POST['endereco']);
    $editora->setId($_POST['id']);

    // Atualizar registro no Banco de Dados
    $dao = new EditoraDAO();
    $dao->update($editora);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');