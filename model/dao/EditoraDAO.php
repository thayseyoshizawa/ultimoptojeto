<?php 
class EditoraDAO {
    public function create($editora){
        try {
            $query = BD::getConexao()->prepare("INSERT INTO editora(nome, endereco) VALUES(:n,:e)");
            $query->bindValue(':n', $editora->getNome(), PDO::PARAM_STR);
            $query->bindValue(':e', $editora->getEndereco(), PDO::PARAM_STR);
            if(!$query->execute())
                print_r($query->errorInfo());
        
        }
        catch(PDOException $e){
            echo"Erro número 1: " . $e->getMessage();
        }
    }

    public function read(){
        
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM editora");
            if(!$query->execute())
                print_r($query->errorInfo());
            
            $editoras = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                $editora = new Editora();
                $editora->setId($linha['idEditora']);
                $editora->setNome($linha['nome']);
                $editora->setEndereco($linha['endereco']);

                array_push($editoras, $editora);
            }

            return $editoras;
        }


        catch(PDOException $e){
            echo"Erro número 2: " . $e->getMessage();
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM editora WHERE idEditora = :i");
            $query->bindValue(':i',$id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());

            $linha = $query->fetch(PDO::FETCH_ASSOC);
            $editora = new Editora();
            $editora->setId($linha['idEditora']);
            $editora->setNome($linha['nome']);


            return $editora;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

    public function update($editora) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE editora 
                    SET nome = :d, endereco = :e 
                    WHERE idEditora = :i"
                );
            $query->bindValue(':d',$editora->getNome(), PDO::PARAM_STR);
            $query->bindValue(':e',$editora->getEndereco(), PDO::PARAM_STR);
            $query->bindValue(':i',$editora->getId(), PDO::PARAM_INT);

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
                "DELETE FROM editora 
                WHERE idEditora = :i"
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