<?php 
class EmprestimoDAO {
    public function create($emprestimo){
        try {
            $query = BD::getConexao()->prepare("INSERT INTO emprestimo(dataEmprestimo, dataDevolucao, pessoa_idPessoa) VALUES(:de,:dd)");
            $query->bindValue(':de', $emprestimo->getDataEmprestimo(), PDO::PARAM_STR);
            $query->bindValue(':dd', $emprestimo->getDataDevolucao(), PDO::PARAM_STR);
            $query->bindValue(':p', $emprestimo->getPessoa()->getId(), PDO::PARAM_STR);
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

                $daoPessoa = new PessoaDAO();
                $pessoa = $daoPessoa->find($linha['pessoa_idpessoa']);

                $emprestimo = new Emprestimo();
                $emprestimo->setId($linha['idemprestimo']);
                $emprestimo->setDataEmprestimo($linha['dataEmprestimo']);
                $emprestimo->setDataDevolucao($linha['dataDevolucao']);
                $emprestimo->setPessoa($pessoa);

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
            $query = BD::getConexao()->prepare("SELECT * FROM emprestimo WHERE idemprestimo = :i");
            $query->bindValue(':i',$id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());

            $linha = $query->fetch(PDO::FETCH_ASSOC);

            $daoPessoa = new PessoaDAO();
            $pessoa = $daoPessoa->find($linha['pessoa_idpessoa']);

            $emprestimo = new Emprestimo();
            $emprestimo->setId($linha['idemprestimo']);
            $emprestimo->setDataEmprestimo($linha['dataemprestimo']); 
            $emprestimo->setDataDevolucao($linha['datadevolucao']);
            $emprestimo->setPessoa($pessoa);


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
                     SET dataemprestimo = :de, datadevolucao = :dd, pessoa_idpessoa = :p
                    WHERE idemprestimo = :i"
                );
            $query->bindValue(':de', $emprestimo->getDataEmprestimo(), PDO::PARAM_STR);
            $query->bindValue(':dd', $emprestimo->getDataDevolucao(), PDO::PARAM_STR);
            $query->bindValue(':p', $emprestimo->getPessoa()->getId(), PDO::PARAM_INT);
            $query->bindValue(':i', $emprestimo->getId(), PDO::PARAM_INT);


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
                WHERE idemprestimo = :i"
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