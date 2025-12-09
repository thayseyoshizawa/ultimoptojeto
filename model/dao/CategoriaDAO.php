<?php 
class CategoriaDAO {
    public function create($categoria){
        try {
            $query = BD::getConexao()->prepare("INSERT INTO categoria(categoria) VALUES(:c)");
            $query->bindValue(':c', $categoria->getCategoria(), PDO::PARAM_STR);
            if(!$query->execute())
                print_r($query->errorInfo());
        
        }
        catch(PDOException $e){
            echo"Erro número 1: " . $e->getMessage();
        }
    }

    public function read(){
        
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM categoria");
            if(!$query->execute())
                print_r($query->errorInfo());
            
            $categorias = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                $categoria = new Categoria();
                $categoria->setId($linha['idCategoria']);
                $categoria->setCategoria($linha['categoria']);

                array_push($categorias, $categoria);
            }

            return $categorias;
        }


        catch(PDOException $e){
            echo"Erro número 2: " . $e->getMessage();
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM categoria WHERE idCategoria = :id");
            $query->bindValue(':id',$id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());

            $linha = $query->fetch(PDO::FETCH_ASSOC);
            $categoria = new Categoria();
            $categoria->setId($linha['idCategoria']);
            $categoria->setCategoria($linha['categoria']);


            return $categoria;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

    public function update($categoria) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE categoria 
                    SET categoria = :c
                    WHERE idCategoria = :i"
                );
            $query->bindValue(':c',$categoria->getCategoria(), PDO::PARAM_STR);
            $query->bindValue(':i',$categoria->getId(), PDO::PARAM_INT);

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
                "DELETE FROM categoria 
                WHERE idCategoria = :i"
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