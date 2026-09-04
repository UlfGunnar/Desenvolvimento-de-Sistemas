<?php 
    class aluno {
        public string $nome;
        public float $media;
        public string $situacao;

        public function __construct(string $nome, float $media, string $situacao) {
            $this->nome = $nome;
            $this->media = $media;
            $this->situacao = $situacao;
        }
    }
?>