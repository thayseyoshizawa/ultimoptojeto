<?php

class Livro {
    private $id;  
    private $titulo;                 
    private $anoPublicacao;       
    private $edicao;
    private $categoria;            
    private $editora;              
    // Getters
    public function getId() { 
        return $this->id; 
    }
    
    public function getTitulo() { 
        return $this->titulo; 
    }
    
    public function getAnoPublicacao() {  // ← camelCase
        return $this->anoPublicacao; 
    }
    
    public function getEdicao() { 
        return $this->edicao; 
    }
    
    public function getCategoria() {      // ← Retorna OBJETO
        return $this->categoria; 
    }
    
    public function getEditora() {        // ← Retorna OBJETO
        return $this->editora; 
    }
    
    // Setters
    public function setId($id) { 
        $this->id = $id; 
    }
    
    public function setTitulo($titulo) { 
        $this->titulo = $titulo; 
    }
    
    public function setAnoPublicacao($anoPublicacao) { 
        $this->anoPublicacao = $anoPublicacao; 
    }
    
    public function setEdicao($edicao) { 
        $this->edicao = $edicao; 
    }
    
    public function setCategoria($categoria) { 
        $this->categoria = $categoria; 
    }
    
    public function setEditora($editora) { 
        $this->editora = $editora; 
    }
    
    public function __toString() {
        return $this->titulo;
    }
}