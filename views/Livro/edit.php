<?php
require_once '../../autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
    $livroDAO = new LivroDAO();
    $livro = $livroDAO->find($id);
    
    if ($livro) {
        $livro->setTitulo($_POST['titulo']);
        $livro->setAnoPublicacao($_POST['anoPublicacao']);
        $livro->setEdicao($_POST['edicao']);
        
        $categoriaDAO = new CategoriaDAO();
        $editoraDAO = new EditoraDAO();
        
        $categoria = $categoriaDAO->find($_POST['categoria_idCategoria']);
        $editora = $editoraDAO->find($_POST['editora_idEditora']);
        
        $livro->setCategoria($categoria);
        $livro->setEditora($editora);
        
        if ($livroDAO->update($livro)) {
            header('Location: index.php');
            exit;
        }
    }
}

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$dao = new LivroDAO();
$livro = $dao->find($id);

if (!$livro) {
    header('Location: index.php');
    exit;
}

$categoriaDAO = new CategoriaDAO();
$editoraDAO = new EditoraDAO();
$categorias = $categoriaDAO->read();
$editoras = $editoraDAO->read();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Editar Livro</h2>
        
        <form method="POST">
            <input type="hidden" name="id" value="<?= $livro->getId() ?>">
            
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" 
                       value="<?= htmlspecialchars($livro->getTitulo()) ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="anoPublicacao" class="form-label">Ano Publicação</label>
                <input type="number" class="form-control" id="anoPublicacao" name="anoPublicacao" 
                       value="<?= $livro->getAnoPublicacao() ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="edicao" class="form-label">Edição</label>
                <input type="number" class="form-control" id="edicao" name="edicao" 
                       value="<?= $livro->getEdicao() ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="categoria_idCategoria" class="form-label">Categoria</label>
                <select class="form-control" id="categoria_idCategoria" name="categoria_idCategoria" required>
                    <?php foreach($categorias as $categoria): ?>
                    <option value="<?= $categoria->getId() ?>" 
                        <?= ($categoria->getId() == $livro->getCategoria()->getId()) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($categoria->getCategoria()) ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="editora_idEditora" class="form-label">Editora</label>
                <select class="form-control" id="editora_idEditora" name="editora_idEditora" required>
                    <?php foreach($editoras as $editora): ?>
                    <option value="<?= $editora->getId() ?>" 
                        <?= ($editora->getId() == $livro->getEditora()->getId()) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($editora->getNome()) ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>