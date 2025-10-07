<?php 
class PessoaDAO{
    public function create($pessoa){
        try {
            $query = BD::getConexao()->prepare("INSERT INTO pessoa(nome) VALUES(:n)");
            $query->bindValue(':n', $pessoa->getNome(), PDO::PARAM_STR);
    
            if(!$query->execute())
                print_r($query->errorInfo());
        
        }
        catch(PDOException $e){
            echo"Erro número 1: " . $e->getMessage();
        }
    }

    public function read(){
        
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM pessoa");
            if(!$query->execute())
                print_r($query->errorInfo());
            
            $pessoas = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                $pessoa = new Pessoa();
                $pessoa->setId($linha['idpessoa']);
                $pessoa->setNome($linha['nome']);
            
                array_push($pessoas, $pessoa);
            }

            return $pessoas;
        }


        catch(PDOException $e){
            echo"Erro número 2: " . $e->getMessage();
        }
    }

   public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM pessoa WHERE idpessoa = :i");
            $query->bindValue(':i',$id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());

            $linha = $query->fetch(PDO::FETCH_ASSOC);
            $pessoa = new Pessoa();
            $pessoa->setId($linha['idpessoa']);
            $pessoa->setNome($linha['nome']);


            return $pessoa;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

    public function update($pessoa) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE pessoa 
                    SET nome = :c
                    WHERE idpessoa = :i"
                );
            $query->bindValue(':c',$pessoa->getNome(), PDO::PARAM_STR);
            $query->bindValue(':i',$pessoa->getId(), PDO::PARAM_INT);

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
                "DELETE FROM pessoa 
                WHERE idpessoa = :i"
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