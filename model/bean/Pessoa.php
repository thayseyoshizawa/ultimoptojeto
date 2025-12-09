<?php

class Pessoa {
    private $id;
    private $nome;
    
    // Getters
    public function getId() { 
        return $this->id; 
    }
    
    public function getNome() { 
        return $this->nome; 
    }
    
    // Setters
    public function setId($id) { 
        $this->id = $id; 
    }
    
    public function setNome($nome) { 
        $this->nome = $nome; 
    }
    
    public function __toString() {
        return $this->nome;
    }
}