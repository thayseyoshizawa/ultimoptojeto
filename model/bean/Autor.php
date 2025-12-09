<?php
class Autor {
    private $id;
    private $nome;
    private $nacionalidade;
    
    public function getId() { 
        return $this->id; 
    }
    
    public function getNome() { 
        return $this->nome; 
    }
    
    public function getNacionalidade() { 
        return $this->nacionalidade; 
    }
    
    public function setId($id) { 
        $this->idAutor = $id; 
    }
    
    public function setNome($nome) { 
        $this->nome = $nome; 
    }
    
    public function setNacionalidade($nacionalidade) { 
        $this->nacionalidade = $nacionalidade; 
    }
    
    public function __toString() {
        return $this->nome;
    }
}