<?php
    require "../../autoload.php";

    $autor = new Autor();
    $autor->setNome($_POST['nome']);
    $autor->setNacionalidade($_POST['nacionalidade']);

    $dao = new AutorDAO();
    $dao->create($autor);

    header('Location: index.php');