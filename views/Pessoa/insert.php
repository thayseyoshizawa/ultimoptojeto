<?php
    require "../../autoload.php";

    $pessoa = new Pessoa();
    $pessoa->setNome($_POST['nome']);

    $dao = new PessoaDAO();
    $dao->create($pessoa);

    header('Location: index.php');