<?php
    require "../../autoload.php";

    $categoria = new Categoria();
    $categoria->setCategoria($_POST['categoria']);
    $categoria->setId($_POST['id']);


    $dao = new CategoriaDAO();
    $dao->update($categoria);

    header('Location: index.php');