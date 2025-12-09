<?php

class LivroTemAutor {
    private $livro;    
    private $autor;    
    
    public function getLivro() { 
        return $this->livro; 
    }
    
    public function getAutor() { 
        return $this->autor; 
    }
    
    public function setLivro($livro) { 
        $this->livro = $livro; 
    }
    
    public function setAutor($autor) { 
        $this->autor = $autor; 
    }
}