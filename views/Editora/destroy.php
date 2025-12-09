<?php
    require "../../autoload.php";

    $dao = new EditoraDAO();
    $dao->destroy($_GET['id']);

    header('Location: index.php');