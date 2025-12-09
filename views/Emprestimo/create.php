<?php
require_once '../../autoload.php';

    $emprestimo = new Emprestimo();
    $emprestimo->setDataemprestimo($_POST['dataemprestimo']);
    $emprestimo->setDatadevolucao($_POST['datadevolucao'] ?? null);
    
    $pessoaDAO = new PessoaDAO();
    $pessoa = $pessoaDAO->find($_POST['pessoa_idPessoa']);
    $emprestimo->setPessoa($pessoa);
    
    $emprestimoDAO = new EmprestimoDAO();
    if ($emprestimoDAO->create($emprestimo)) {
        header('Location: index.php');
        exit;
    }

    $daoPessoa = new PessoaDAO();
    $pessoas = $daoPessoa->read();
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="my-4">
        <h2>Cadastrar Empréstimo</h2>
        <form method="POST"> 
            <p class="form-group">
                <label for="dataemprestimo">Data Empréstimo</label>
                <input type="date" name="dataemprestimo" class="form-control" required>
            </p>
            <p class="form-group">
                <label for="datadevolucao">Data Devolução</label>
                <input type="date" name="datadevolucao" class="form-control">
            </p>
            <p class="form-group">
                <label for="pessoa_idPessoa">Pessoa</label>
                <select name="pessoa_idPessoa" class="form-control" required>
                    <option value="">Selecione...</option>
                    <?php foreach($pessoas as $pessoa): ?>
                        <option value="<?= $pessoa->getId() ?>">
                            <?= htmlspecialchars($pessoa->getNome()) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p class="form-group">
                <input type="reset" value="Limpar" class="btn btn-default">
                <input type="submit" value="Salvar" class="btn btn-primary">
            </p>
        </form>
    </div>
</main>