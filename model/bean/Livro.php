<?php
    class Livro {
        // Atributos
        private $id;
        private $titulo;
        private $anoPublicacao;
        private $edicao;
        
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

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->titulo;
        }
    }