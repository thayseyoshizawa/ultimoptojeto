<?php
    class Livro {
        // Atributos
        private $id;
        private $titulo;
        private $anoPublicacao;
        private $edicao;
        private $categoria;
        private $editora;
        
        // Métodos
         public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }
        
        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getAnoPublicacao() {
            return $this->anoPublicacao;
        }

        public function setAnoPublicacao($anoPublicacao) {
            $this->anoPublicacao = $anoPublicacao;
        }

        public function getEdicao() {
            return $this->edicao;
        }

        public function setEdicao($edicao) {
            $this->edicao = $edicao;
        }

        public function getCategoria() {
            return $this->categoria;
        }

        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }

         public function getEditora() {
            return $this->editora;
        }

        public function setEditora($editora) {
            $this->editora = $editora;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->titulo;
        }
    }