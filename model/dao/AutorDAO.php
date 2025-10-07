<?php 
class AutorDAO {
    public function create($autor){
        try {
            $query = BD::getConexao()->prepare("INSERT INTO autor(nome,nacionalidade) VALUES(:n,:na)");
            $query->bindValue(':n', $autor->getNome(), PDO::PARAM_STR);
            $query->bindValue(':na', $autor->getNacionalidade(), PDO::PARAM_STR);

            if(!$query->execute())
                print_r($query->errorInfo());
        
        }
        catch(PDOException $e){
            echo"Erro número 1: " . $e->getMessage();
        }
    }

    public function read(){
        
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM autor");
            if(!$query->execute())
                print_r($query->errorInfo());
            
            $autores = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                $autor = new Autor();
                $autor->setId($linha['idAutor']);
                $autor->setNome($linha['nome']);
                $autor->setNacionalidade($linha['nacionalidade']);

                array_push($autores, $autor);
            }

            return $autores;
        }


        catch(PDOException $e){
            echo"Erro número 2: " . $e->getMessage();
        }
    }
   
    public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM autor WHERE idAutor = :i");
            $query->bindValue(':i',$id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());

            $linha = $query->fetch(PDO::FETCH_ASSOC);
            $autor = new Autor();
            $autor->setId($linha['idAutor']);
            $autor->setNome($linha['nome']);
            $autor->setNacionalidade($linha['nacionalidade']);

                return $autor;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

    public function update($autor) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE autor 
                    SET nome = :c, nacionalidade = :r
                    WHERE idAutor = :i"
                );
            $query->bindValue(':c',$autor->getNome(), PDO::PARAM_STR);
            $query->bindValue(':r',$autor->getNacionalidade(), PDO::PARAM_STR);
            $query->bindValue(':i',$autor->getId(), PDO::PARAM_INT);

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
                "DELETE FROM autor 
                WHERE idAutor = :i"
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