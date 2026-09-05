<?php
    class leitor {
        public string $nome;
        public string $email;

        public function __construct(string $nome, string $email) {
            $this->nome = $nome;
            $this->media = $email;
        }
    }

?>