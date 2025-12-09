<?php
require_once __DIR__ . '/../../autoload.php';  

$dao = new LivroDAO();
$livros = $dao->read();
?>
<!DOCTYPE html>  
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros - Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="my-4">
                    <h2>Livros</h2>
                    <a href="create.php" class="btn btn-primary mb-3">Novo Livro</a>
                    
                    <?php if (count($livros) > 0): ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Ano Publicação</th>
                                <th>Edição</th>
                                <th>Categoria</th>
                                <th>Editora</th>
                                <th>Autores</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($livros as $livro): ?>
                            <tr>
                                <td><?= $livro->getId() ?></td>
                                <td><?= htmlspecialchars($livro->getTitulo()) ?></td>
                                <td><?= $livro->getAnoPublicacao() ?></td>
                                <td><?= $livro->getEdicao() ?></td>
                                <td><?= $livro->getCategoria()->getCategoria() ?></td>
                                <td><?= htmlspecialchars($livro->getEditora()->getNome()) ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $livro->getId() ?>" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="destroy.php?id=<?= $livro->getId() ?>" 
                                       class="btn btn-sm btn-danger" 
                                       onclick="return confirm('Tem certeza?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="alert alert-info">Nenhum livro cadastrado.</div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>