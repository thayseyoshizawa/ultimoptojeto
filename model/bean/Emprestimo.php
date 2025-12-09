<?php

class Emprestimo { 
    private $id;
    private $dataemprestimo;
    private $datadevolucao;
    private $pessoa;  
    
    public function getId() { return $this->id; }
    public function getDataemprestimo() { return $this->dataemprestimo; }
    public function getDatadevolucao() { return $this->datadevolucao; }
    public function getPessoa() { return $this->pessoa; } 
    
    public function setId($id) { $this->id = $id; }
    public function setDataemprestimo($dataemprestimo) { $this->dataemprestimo = $dataemprestimo; }
    public function setDatadevolucao($datadevolucao) { $this->datadevolucao = $datadevolucao; }
    public function setPessoa($pessoa) { $this->pessoa = $pessoa; }  
}