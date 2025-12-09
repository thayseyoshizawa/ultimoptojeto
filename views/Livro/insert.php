<?php
require "../../autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Debug: veja o que está sendo enviado
        echo "<pre>";
        echo "Dados recebidos:\n";
        print_r($_POST);
        echo "</pre>";
        
        $livro = new Livro();
        $livro->setTitulo($_POST['titulo']);
        
        // Trata campos opcionais
        $anoPublicacao = $_POST['anoPublicacao'];
        $edicao = $_POST['edicao'];
        
        $livro->setAnoPublicacao(empty($anoPublicacao) ? null : $anoPublicacao);
        $livro->setEdicao(empty($edicao) ? null : $edicao);

        // IMPORTANTE: Seus Beans usam setId() e getId()
        $categoria = new Categoria();
        $categoria->setId($_POST['categoria_idCategoria']); // CORRETO: setId()
        $livro->setCategoria($categoria);

        $editora = new Editora();
        $editora->setId($_POST['editora_idEditora']); // CORRETO: setId()
        $livro->setEditora($editora);
        
        echo "<pre>";
        echo "Objeto Livro antes de salvar:\n";
        print_r($livro);
        echo "Categoria ID: " . $livro->getCategoria()->getId() . "\n";
        echo "Editora ID: " . $livro->getEditora()->getId() . "\n";
        echo "</pre>";
        
        $dao = new LivroDAO();
        $resultado = $dao->create($livro);
        
        if ($resultado) {
            echo "Livro inserido com sucesso! Redirecionando...";
            header('Location: index.php');
            exit;
        } else {
            echo "Erro: LivroDAO::create() retornou false.";
        }
    } catch (Exception $e) {
        echo "<h3>ERRO DETALHADO:</h3>";
        echo "<p><strong>Mensagem:</strong> " . $e->getMessage() . "</p>";
        echo "<p><strong>Arquivo:</strong> " . $e->getFile() . "</p>";
        echo "<p><strong>Linha:</strong> " . $e->getLine() . "</p>";
        echo "<br><a href='create.php'>Voltar ao formulário</a>";
    }
} else {
    header('Location: create.php');
    exit;
}
?>