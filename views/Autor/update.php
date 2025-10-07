<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $autor = new Autor();
    $autor->setNome($_POST['nome']);
    $autor->setNacionalidade($_POST['nacionalidade']);
    $autor->setId($_POST['id']);

    // Atualizar registro no Banco de Dados
    $dao = new AutorDAO();
    $dao->update($autor);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');