<?php

class Categoria{
    private $id;
    private $categoria;
    
    // Getters
    public function getId() { 
        return $this->id; 
    }
    
    public function getCategoria() { 
        return $this->categoria; 
    }
    
    // Setters
    public function setId($id) { 
        $this->id = $id; 
    }
    
    public function setCategoria($categoria) { 
        $this->categoria = $categoria; 
    }
    
    public function __toString() {
        return $this->categoria;
    }
}