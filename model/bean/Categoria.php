<?php
    class Categoria {
        // Atributos
        private $id;
        private $categoria;

        
        // Métodos
         public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }
        
        public function getCategoria() {
            return $this->categoria;
        }

        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }


        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->categoria;
        }
    }