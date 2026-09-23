<?php
    class pessoa {
        public string $nome;
        public int $nivel_gay;

        public function __construct(string $nome, int $nivel_gay) {
            $this->nome = $nome;
            $this->nivel_gay = $nivel_gay;
        }
    }

?>