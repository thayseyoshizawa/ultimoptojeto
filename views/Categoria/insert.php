<?php
    require "../../autoload.php";

    $categoria = new Categoria();
    $categoria->setCategoria($_POST['categoria']);

    $dao = new CategoriaDAO();
    $dao->create($categoria);

    header('Location: index.php');