<?php

class LivroTemAutorDAO {
    
    public function create($livroTemAutor) {
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO livro_has_autor(livro_idLivro, autor_idAutor) 
                 VALUES (:livro_id, :autor_id)"
            );
            
            $query->bindValue(':livro_id', $livroTemAutor->getLivro()->getId(), PDO::PARAM_INT);
            $query->bindValue(':autor_id', $livroTemAutor->getAutor()->getId(), PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());
                
            return true;
        }
        catch(PDOException $e) {
            echo "Erro ao associar autor ao livro: " . $e->getMessage();
            return false;
        }
    }

    public function read($idLivro) {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM livro_has_autor WHERE livro_idLivro = :livro_id"
            );
            $query->bindValue(':livro_id', $idLivro, PDO::PARAM_INT);                

            if(!$query->execute())
                print_r($query->errorInfo());

            $livroTemAutores = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $daoAutor = new AutorDAO();
                $autor = $daoAutor->find($linha['autor_idAutor']);  
                
                $livro = new Livro();
                $livro->setId($idLivro);                  

                $livroTemAutor = new LivroTemAutor();
                $livroTemAutor->setLivro($livro);                    
                $livroTemAutor->setAutor($autor);

                array_push($livroTemAutores, $livroTemAutor);
            }

            return $livroTemAutores;
        }
        catch(PDOException $e) {
            echo "Erro ao ler autores do livro: " . $e->getMessage();
            return array();
        }
    }

    public function destroy($idLivro, $idAutor) {
        try {
            $query = BD::getConexao()->prepare(
                "DELETE FROM livro_has_autor 
                 WHERE livro_idLivro = :livro_id AND autor_idAutor = :autor_id"
            );
            $query->bindValue(':livro_id', $idLivro, PDO::PARAM_INT);
            $query->bindValue(':autor_id', $idAutor, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());
                
            return true;
        }
        catch(PDOException $e) {
            echo "Erro ao remover autor do livro: " . $e->getMessage();
            return false;
        }
    }
    
      
    
}