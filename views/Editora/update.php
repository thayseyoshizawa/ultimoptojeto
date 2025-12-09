<?php
    require "../../autoload.php";

    $editora = new Editora();
    $editora->setNome($_POST['nome']);
    $editora->setEndereco($_POST['endereco']);
    $editora->setId($_POST['id']);

    $dao = new EditoraDAO();
    $dao->update($editora);

    header('Location: index.php');