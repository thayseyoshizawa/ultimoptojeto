<?php
class EmprestimoDAO {
    public function create($emprestimo){
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO emprestimo(dataemprestimo, datadevolucao, pessoa_idpessoa)
                VALUES(:data_emp, :data_dev, :pessoa_id)"
            );
            $query->bindValue(':data_emp', $emprestimo->getDatemprestimo(), PDO::PARAM_STR);
            $query->bindValue(':data_dev', $emprestimo->getDatadevolucao(), PDO::PARAM_STR);
            $query->bindValue(':pessoa_id', $emprestimo->getPessoa()->getId(), PDO::PARAM_INT);
            
            return $query->execute();
        }
        catch(PDOException $e){
            echo "Erro ao criar empréstimo: " . $e->getMessage();
            return false;
        }
    }

    public function read(){
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM emprestimo");
            $query->execute();
            
            $emprestimos = array();
            $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($resultados as $linha){
               
                $daoPessoa = new PessoaDAO();
                $pessoa = $daoPessoa->find($linha['pessoa_idpessoa']);  
                
                $emprestimo = new Emprestimo();
                $emprestimo->setId($linha['idemprestimo']);           
                $emprestimo->setDataEmprestimo($linha['dataemprestimo']); 
                $emprestimo->setDataDevolucao($linha['datadevolucao']);   
                $emprestimo->setPessoa($pessoa);
                
                array_push($emprestimos, $emprestimo);
            }
            
            return $emprestimos;
        }
        catch(PDOException $e){
            echo "Erro ao ler empréstimos: " . $e->getMessage();
            return array();
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM emprestimo WHERE idemprestimo = :id"); 
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            
            $linha = $query->fetch(PDO::FETCH_ASSOC);
            
            if(!$linha) return null;
            
           
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
            echo "Erro ao buscar empréstimo: " . $e->getMessage();
            return null;
        }
    }

    public function update($emprestimo) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE emprestimo 
                SET dataemprestimo = :data_emp,      
                    datadevolucao = :data_dev,       
                    pessoa_idpessoa = :pessoa_id     
                WHERE idemprestimo = :id"            
            );
            
            $query->bindValue(':data_emp', $emprestimo->getDataemprestimo(), PDO::PARAM_STR);
            $query->bindValue(':data_dev', $emprestimo->getDatadevolucao(), PDO::PARAM_STR);
            $query->bindValue(':pessoa_id', $emprestimo->getPessoa()->getId(), PDO::PARAM_INT);
            $query->bindValue(':id', $emprestimo->getId(), PDO::PARAM_INT);
            
            return $query->execute();
        }
        catch(PDOException $e) {
            echo "Erro ao atualizar empréstimo: " . $e->getMessage();
            return false;
        }
    }

    public function destroy($id) {
        try {
            $query = BD::getConexao()->prepare("DELETE FROM emprestimo WHERE idemprestimo = :id"); 
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            return $query->execute();
        }
        catch(PDOException $e) {
            echo "Erro ao excluir empréstimo: " . $e->getMessage();
            return false;
        }
    }
}