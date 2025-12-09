<?php
class LivroDAO {
    public function create($livro){
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO livro(titulo, anopublicacao, edicao, categoria_idCategoria, editora_idEditora) 
                VALUES(:titulo, :ano, :edicao, :categoria_id, :editora_id)"
            );
            
            $anoPublicacao = $livro->getAnoPublicacao();
            $edicao = $livro->getEdicao();
            
            $query->bindValue(':titulo', $livro->getTitulo(), PDO::PARAM_STR);
            
            if ($anoPublicacao === null || $anoPublicacao === '') {
                $query->bindValue(':ano', null, PDO::PARAM_NULL);
            } else {
                $query->bindValue(':ano', $anoPublicacao, PDO::PARAM_STR);
            }
            
            if ($edicao === null || $edicao === '') {
                $query->bindValue(':edicao', null, PDO::PARAM_NULL);
            } else {
                $query->bindValue(':edicao', $edicao, PDO::PARAM_STR);
            }
            
           $query->bindValue(':categoria_id', $livro->getCategoria()->getId(), PDO::PARAM_INT);
           $query->bindValue(':editora_id', $livro->getEditora()->getId(), PDO::PARAM_INT);

            if(!$query->execute())
            print_r($query->errorInfo());
        }
        catch(PDOException $e) {
            throw new Exception("Erro ao criar livro: " . $e->getMessage());
        }
    }

    public function read(){
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM livro");
            $query->execute();
            
            $livros = array();
            $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($resultados as $linha){
                $daoCategoria = new CategoriaDAO();
                $categoria = $daoCategoria->find($linha['categoria_idCategoria']);
                
                $daoEditora = new EditoraDAO();
                $editora = $daoEditora->find($linha['editora_idEditora']);
                
                $livro = new Livro();
                $livro->setId($linha['idLivro']);
                $livro->setTitulo($linha['titulo']);
                $livro->setAnoPublicacao($linha['anopublicacao']); 
                $livro->setEdicao($linha['edicao']);
                $livro->setCategoria($categoria);
                $livro->setEditora($editora);
                
                array_push($livros, $livro);
            }
            
            return $livros;
        }
        catch(PDOException $e){
            throw new Exception("Erro ao ler livros: " . $e->getMessage());
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM livro WHERE idLivro = :id");
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            
            $linha = $query->fetch(PDO::FETCH_ASSOC);
            
            if(!$linha) return null;
            
            $daoCategoria = new CategoriaDAO();
            $categoria = $daoCategoria->find($linha['categoria_idCategoria']);
            
            $daoEditora = new EditoraDAO();
            $editora = $daoEditora->find($linha['editora_idEditora']);
            
            $livro = new Livro();
            $livro->setId($linha['idLivro']);
            $livro->setTitulo($linha['titulo']);
            $livro->setAnoPublicacao($linha['anopublicacao']); 
            $livro->setEdicao($linha['edicao']);
            $livro->setCategoria($categoria);
            $livro->setEditora($editora);
            
            return $livro;
        }
        catch(PDOException $e) {
            throw new Exception("Erro ao buscar livro: " . $e->getMessage());
        }
    }

    public function update($livro) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE livro 
                SET titulo = :titulo, 
                    anopublicacao = :ano, 
                    edicao = :edicao, 
                    categoria_idCategoria = :categoria_id, 
                    editora_idEditora = :editora_id 
                WHERE idLivro = :id"
            );
            
            $anoPublicacao = $livro->getAnoPublicacao();
            $edicao = $livro->getEdicao();
            
            $query->bindValue(':titulo', $livro->getTitulo(), PDO::PARAM_STR);
            
            if ($anoPublicacao === null || $anoPublicacao === '') {
                $query->bindValue(':ano', null, PDO::PARAM_NULL);
            } else {
                $query->bindValue(':ano', $anoPublicacao, PDO::PARAM_STR);
            }
            
            if ($edicao === null || $edicao === '') {
                $query->bindValue(':edicao', null, PDO::PARAM_NULL);
            } else {
                $query->bindValue(':edicao', $edicao, PDO::PARAM_STR);
            }
            
            $query->bindValue(':categoria_id', $livro->getCategoria()->getId(), PDO::PARAM_INT);
            $query->bindValue(':editora_id', $livro->getEditora()->getId(), PDO::PARAM_INT);
            $query->bindValue(':id', $livro->getId(), PDO::PARAM_INT);
            
            return $query->execute();
        }
        catch(PDOException $e) {
            throw new Exception("Erro ao atualizar livro: " . $e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $query = BD::getConexao()->prepare("DELETE FROM livro WHERE idLivro = :id");
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            return $query->execute();
        }
        catch(PDOException $e) {
            throw new Exception("Erro ao excluir livro: " . $e->getMessage());
        }
    }
}