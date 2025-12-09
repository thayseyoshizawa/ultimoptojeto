<?php
    require "../../autoload.php";

    $pessoa = new Pessoa();
    $pessoa->setNome($_POST['nome']);
    $pessoa->setId($_POST['id']);

    $dao = new PessoaDAO();
    $dao->update($pessoa);

    header('Location: index.php');