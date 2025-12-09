<?php
require "../../autoload.php";
    $dao = new LivroDAO();
    $dao->destroy($_GET['id']);
    
    header('Location: index.php');