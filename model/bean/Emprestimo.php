<?php
// models/bean/Emprestimo.php

class Emprestimo {  // ← REMOVE "Bean" do nome
    private $id;
    private $dataemprestimo;
    private $datadevolucao;
    private $pessoa;  // ← Objeto Pessoa, não ID
    
    // Getters (mude os nomes)
    public function getId() { return $this->id; }
    public function getDataemprestimo() { return $this->dataemprestimo; }
    public function getDatadevolucao() { return $this->datadevolucao; }
    public function getPessoa() { return $this->pessoa; }  // ← Retorna objeto
    
    // Setters
    public function setId($id) { $this->id = $id; }
    public function setDataemprestimo($dataemprestimo) { $this->dataemprestimo = $dataemprestimo; }
    public function setDatadevolucao($datadevolucao) { $this->datadevolucao = $datadevolucao; }
    public function setPessoa($pessoa) { $this->pessoa = $pessoa; }  // ← Recebe objeto
}