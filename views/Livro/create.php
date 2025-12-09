<?php
require "../../autoload.php";

$daoCategoria = new CategoriaDAO();
$categorias = $daoCategoria->read();

$daoEditora = new EditoraDAO();
$editoras = $daoEditora->read();

if($categorias === null) $categorias = [];
if($editoras === null) $editoras = [];
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Astro v5.9.2">
    <title>Dashboard Template · Bootstrap v5.3</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <script src="./../js/color-modes.js"></script>
    <link href="./../css/bootstrap.min.css" rel="stylesheet">
    <meta name="theme-color" content="#712cf9">
    <link href="./../css/dashboard.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(-bd-violet-rgb);
            --bs-btn-active-color: var(-bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>
</head>

<body>
    <!-- TODO O SVG E DROPDOWN DO TEMA (copia do Autor/create.php) -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <!-- Copie TODO o conteúdo SVG do Autor/create.php aqui -->
    </svg>
    
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <!-- Copie o dropdown do tema do Autor/create.php aqui -->
    </div>

    <!-- HEADER -->
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Company name</a>
        <!-- Copie o resto do header do Autor/create.php -->
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- INCLUI O SIDEBAR (CORRIGIDO) -->    
            <?php include "../../sidebar.html"; ?>
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="my-4">
                    <h2>Cadastrar Livro</h2>
                    
                    <!-- MOSTRA ERROS SE NÃO HOUVER DADOS (CORRIGIDO) -->
                    <?php if(is_array($categorias) && count($categorias) == 0): ?>
                        <div class="alert alert-danger">
                            <strong>ERRO:</strong> Nenhuma categoria encontrada! 
                            <a href="/seuprojeto/views/Categoria/create.php" class="alert-link">
                                Cadastre uma categoria primeiro
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(is_array($editoras) && count($editoras) == 0): ?>
                        <div class="alert alert-danger">
                            <strong>ERRO:</strong> Nenhuma editora encontrada! 
                            <a href="/seuprojeto/views/Editora/create.php" class="alert-link">
                                Cadastre uma editora primeiro
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Só mostra formulário se tiver dados -->
                    <?php if(count($categorias) > 0 && count($editoras) > 0): ?>
                    <form action="insert.php" method="post">
                        <div class="form-group mb-3">
                            <label for="titulo">Título *</label>
                            <input type="text" name="titulo" class="form-control" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="anoPublicacao">Ano Publicação</label>
                            <input type="text" name="anoPublicacao" class="form-control">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="edicao">Edição</label>
                            <input type="text" name="edicao" class="form-control">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="categoria_idCategoria">Categoria *</label>
                            <select name="categoria_idCategoria" class="form-control" required>
                                <option value="">-- Selecione uma categoria --</option>
                                <?php foreach($categorias as $categoria): ?>
                                    <option value="<?= $categoria->getId() ?>">
                                        <?= htmlspecialchars($categoria->getCategoria()) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-muted">
                                Categorias disponíveis: <?= count($categorias) ?>
                            </small>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="editora_idEditora">Editora *</label>
                            <select name="editora_idEditora" class="form-control" required>
                                <option value="">-- Selecione uma editora --</option>
                                <?php foreach($editoras as $editora): ?>
                                    <option value="<?= $editora->getId() ?>">
                                        <?= htmlspecialchars($editora->getNome()) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-muted">
                                Editoras disponíveis: <?= count($editoras) ?>
                            </small>
                        </div>
                        
                        <div class="form-group mb-3">
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="index.php" class="btn btn-outline-dark">Voltar</a>
                        </div>
                    </form>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>

    <script src="./../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
    <script src="./../js/dashboard.js"></script>
</body>
</html>