<?php
    class Pessoa {
        // Atributos
        private $id;
        private $nome;
        
        // Métodos
         public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }
        
        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->nome;
        }
    }