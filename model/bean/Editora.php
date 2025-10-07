<?php
    class Editora {
        // Atributos
        private $id;
        private $nome;
        private $endereco;

        
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

        public function getEndereco() {
            return $this->endereco;
        }

        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }


        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->nome;
        }
    }