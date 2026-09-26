USE escola_formulario;

CREATE TABLE IF NOT EXISTS universade (
    CNPJ VARCHAR(14) PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    rua VARCHAR(255) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    numero VARCHAR(4) NOT NULL
); 