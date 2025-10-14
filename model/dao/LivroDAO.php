<?php 
class LivroDAO {
    public function create($livro){
        try {
            $query = BD::getConexao()->prepare("INSERT INTO livro(titulo,anoPublicacao,edicao, idCategoria, idEditora) VALUES(:t,:a,:e, :c, :d)");
            $query->bindValue(':t', $livro->getTitulo(), PDO::PARAM_STR);
            $query->bindValue(':a', $livro->getAnoPublicacao(), PDO::PARAM_STR);
            $query->bindValue(':e', $livro->getEdicao(), PDO::PARAM_STR);
            $query->bindValue(':c', $livro->getCategoria() -> getId(), PDO::PARAM_STR);
            $query->bindValue(':d', $livro->getEditora() -> getId(), PDO::PARAM_STR);

            if(!$query->execute())
                print_r($query->errorInfo());
        
        }
        catch(PDOException $e){
            echo"Erro número 1: " . $e->getMessage();
        }
    }

    public function read(){
        
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM livro");
            if(!$query->execute())
                print_r($query->errorInfo());
            
            $livros = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                $daoLivro = new CategoriaDAO();
                $categoria = $dao->find($linha['idCategoria']);
                $daoLivro = new EditoraDAO();
                $editora = $dao->find($linha['idEditora']);

                $livro = new Livro();
                $livro->setId($linha['idLivro']);
                $livro->setTitulo($linha['titulo']);
                $livro->setAnoPublicacao($linha['anoPublicacao']);
                $livro->setEdicao($linha['edicao']);

                $livro->setCategoria($categoria);
                $livro->setEditora($editora);

                array_push($livros, $livro);
            }

            return $livros;
        }


        catch(PDOException $e){
            echo"Erro número 2: " . $e->getMessage();
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM livro WHERE idLivro = :i");
            $query->bindValue(':i',$id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());

            $linha = $query->fetch(PDO::FETCH_ASSOC);
            $livro = new Livro();
            $livro->setId($linha['idLivro']);
            $livro->setTitulo($linha['titulo']);
            $livro->setAnoPublicacao($linha['anoPublicacao']);
            $livro->setEdicao($linha['edicao']);


            return $livro;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

    public function update($livro) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE livro 
                    SET titulo = :c, anoPublicacao = :d, edicao = :e 
                    WHERE idLivro = :i"
                );
            $query->bindValue(':c',$livro->getTitulo(), PDO::PARAM_STR);
            $query->bindValue(':c',$livro->getAnoPublicacao(), PDO::PARAM_STR);
            $query->bindValue(':c',$livro->getEdicao(), PDO::PARAM_STR);
            $query->bindValue(':i',$livro->getId(), PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

    public function destroy($id) {
        try {
            $query = BD::getConexao()->prepare(
                "DELETE FROM livro 
                WHERE idLivro = :i"
                );
            $query->bindValue(':i',$id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    
}