<?php
    class Emprestimo {
        // Atributos
        private $id;
        private $dataEmprestimo;
        private $dataDevolucao;

        
        // Métodos
         public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }
        
        public function getDataEmprestimo() {
            return $this->dataEmprestimo;
        }

        public function setDataEmprestimo($dataEmprestimo) {
            $this->dataEmprestimo = $dataEmprestimo;
        }

        public function getDataDevolucao() {
            return $this->dataDevolucao;
        }

        public function setDataDevolucao($dataDevolucao) {
            $this->dataDevolucao = $dataDevolucao;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->dataEmprestimo;
        }
    }