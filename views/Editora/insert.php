<?php
    require "../../autoload.php";

    $editora = new Editora();
    $editora->setNome($_POST['nome']);
    $editora->setEndereco($_POST['endereco']);

    $dao = new EditoraDAO();
    $dao->create($editora);

    header('Location: index.php');