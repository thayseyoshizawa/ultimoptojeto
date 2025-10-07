<?php 
class EmprestimoDAO {
    public function create($emprestimo){
        try {
            $query = BD::getConexao()->prepare("INSERT INTO emprestimo(dataEmprestimo, dataDevolucao) VALUES(:de,:dd)");
            $query->bindValue(':de', $emprestimo->getDataEmprestimo(), PDO::PARAM_STR);
            $query->bindValue(':dd', $emprestimo->getDataDevolucao(), PDO::PARAM_STR);
            if(!$query->execute())
                print_r($query->errorInfo());
        
        }
        catch(PDOException $e){
            echo"Erro número 1: " . $e->getMessage();
        }
    }

    public function read(){
        
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM emprestimo");
            if(!$query->execute())
                print_r($query->errorInfo());
            
            $emprestimos = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                $emprestimo = new Emprestimo();
                $emprestimo->setId($linha['id_emprestimo']);
                $emprestimo->setDataEmprestimo($linha['dataEmprestimo']);
                $emprestimo->setDataDevolucao($linha['dataDevolucao']);

                array_push($emprestimos, $emprestimo);
            }

            return $emprestimos;
        }


        catch(PDOException $e){
            echo"Erro número 2: " . $e->getMessage();
        }
    }
    
 public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM emprestimo WHERE idEmprestimo = :i");
            $query->bindValue(':i',$id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());

            $linha = $query->fetch(PDO::FETCH_ASSOC);
            $emprestimo = new Emprestimo();
            $emprestimo->setId($linha['idEmprestimo']);
            $emprestimo->setEmprestimo($linha['nome']);


            return $emprestimo;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

    public function update($emprestimo) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE emprestimo 
                    SET emprestimo = :c, dataEmprestimo = :d, dataDevolucao = :e 
                    WHERE idEmprestimo = :i"
                );
            $query->bindValue(':c',$emprestimo->getDataEmprestimo(), PDO::PARAM_STR);
            $query->bindValue(':c',$emprestimo->getDataDevolucao(), PDO::PARAM_STR);
            $query->bindValue(':i',$emprestimo->getId(), PDO::PARAM_INT);

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
                "DELETE FROM emprestimo 
                WHERE idEmprestimo = :i"
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