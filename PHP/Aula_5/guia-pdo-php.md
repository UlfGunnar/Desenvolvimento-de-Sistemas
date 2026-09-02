# PDO no PHP: Guia de Estudo Aprofundado

*Material de apoio para a atividade de Sala de Aula Invertida — organizado nos cinco grupos temáticos propostos.*

## Introdução

O PDO (PHP Data Objects) é um dos pilares para quem trabalha com bancos de dados relacionais em PHP. Este material reúne, de forma organizada, os conceitos, explicações e exemplos práticos necessários para o estudo aprofundado de cada um dos cinco grupos: fundamentos do PDO, conexão com o banco, tratamento de erros, prepared statements e manipulação de dados (INSERT, UPDATE, DELETE).

---

## GRUPO 1 — O que é PDO e por que utilizá-lo?

### 1.1 Definição de PDO

PDO significa **PHP Data Objects**. É uma extensão nativa do PHP, disponível desde a versão 5.1, que oferece uma **camada de abstração orientada a objetos** para acesso a bancos de dados. Antes do PDO, cada banco de dados possuía sua própria extensão específica no PHP (como as antigas funções `mysql_*` ou as funções `pg_*` para PostgreSQL), cada uma com sintaxe e recursos diferentes — o que tornava o código pouco portátil e dificultava a adoção padronizada de boas práticas de segurança. **O problema que o PDO resolve** é exatamente essa fragmentação: ele oferece uma única interface, consistente, para que a aplicação PHP se comunique com diferentes SGBDs, sem que o programador precise reaprender uma API inteira a cada troca de banco de dados.

### 1.2 Para que o PDO é utilizado

O PDO é utilizado para:
- Abrir e gerenciar conexões com bancos de dados;
- Executar comandos SQL (`SELECT`, `INSERT`, `UPDATE`, `DELETE`, `CREATE`, entre outros);
- Preparar e executar **prepared statements** (comandos SQL parametrizados);
- Tratar erros de banco de dados de forma padronizada, usando exceções;
- Controlar transações (`beginTransaction`, `commit`, `rollBack`).

### 1.3 Vantagens de utilizar o PDO

- **Portabilidade**: a mesma lógica de código pode ser reaproveitada para bancos diferentes, bastando trocar o driver na string de conexão (DSN).
- **Segurança**: suporte nativo a prepared statements, reduzindo drasticamente o risco de SQL Injection.
- **Orientação a objetos**: API única e consistente, mais organizada do que abordagens puramente procedurais.
- **Tratamento de exceções**: é possível capturar e tratar erros com `try/catch`, em vez de depender de checagens manuais de código de erro.
- **Suporte a transações**, importante em operações que envolvem múltiplos comandos que precisam ser tratados como uma unidade.

### 1.4 Quais bancos de dados podem ser utilizados com PDO

O PDO funciona por meio de **drivers específicos** para cada SGBD, entre eles:
- MySQL / MariaDB (`pdo_mysql`)
- PostgreSQL (`pdo_pgsql`)
- SQLite (`pdo_sqlite`)
- Microsoft SQL Server (`pdo_sqlsrv`)
- Oracle (`pdo_oci`)
- IBM DB2/Informix (`pdo_ibm`)
- ODBC (`pdo_odbc`), entre outros.

Para que um driver funcione, ele precisa estar habilitado na configuração do PHP (arquivo `php.ini`).

### 1.5 Diferenças gerais entre PDO e outras formas de acesso, como MySQLi

| Aspecto | PDO | MySQLi |
|---|---|---|
| Bancos suportados | Múltiplos (MySQL, PostgreSQL, SQLite, SQL Server, Oracle etc.) | Apenas MySQL/MariaDB |
| Estilo de programação | Somente orientado a objetos | Orientado a objetos **ou** procedural |
| Placeholders | Nomeados (`:nome`) e posicionais (`?`) | Apenas posicionais (`?`) |
| Prepared statements | Sim | Sim |
| Portabilidade entre bancos | Alta | Baixa (exclusivo do MySQL) |

Em resumo, o MySQLi é uma opção enxuta e específica para MySQL, enquanto o PDO prioriza flexibilidade e portabilidade — sendo geralmente a escolha preferida quando existe a possibilidade de a aplicação precisar suportar mais de um banco de dados no futuro.

### 1.6 Exemplo mínimo de criação de um objeto PDO

```php
<?php
// Cria uma instância de PDO conectada a um banco MySQL chamado "teste"
$pdo = new PDO('mysql:host=localhost;dbname=teste', 'root', '');
```

Esse é o exemplo mais simples possível: o construtor recebe a DSN, o usuário e a senha, e devolve um objeto `PDO` pronto para ser utilizado nas operações seguintes.

---

## GRUPO 2 — Conexão com banco de dados usando PDO

Para que a conexão aconteça, o PHP precisa de um conjunto específico de informações, detalhadas a seguir.

### 2.1 O que é DSN (Data Source Name)

A DSN é uma **string de configuração** que informa ao PDO qual driver deve ser usado e como localizar o banco de dados. Ela segue o formato geral:

```
driver:parametro1=valor1;parametro2=valor2;...
```

É o primeiro argumento passado ao construtor de `PDO`, e é a partir dela que o PDO decide qual driver (MySQL, PostgreSQL etc.) e quais parâmetros de conexão utilizar.

### 2.2 Host do banco de dados

É o endereço do servidor onde o banco de dados está localizado — pode ser `localhost` (quando o banco está na mesma máquina da aplicação), um endereço IP (`192.168.0.10`) ou um nome de domínio (`db.minhaempresa.com`), no caso de servidores remotos.

### 2.3 Porta de conexão

É a porta TCP na qual o SGBD está "escutando" as conexões. Cada banco costuma ter uma porta padrão (MySQL: 3306; PostgreSQL: 5432; SQL Server: 1433). Quando o servidor usa a porta padrão, esse parâmetro pode até ser omitido, mas é boa prática declará-lo explicitamente para deixar a configuração clara.

### 2.4 Nome do banco de dados

O parâmetro `dbname` indica **qual banco específico**, dentro do servidor, será utilizado — um mesmo servidor pode hospedar vários bancos de dados diferentes.

### 2.5 Usuário e senha

São as credenciais de acesso, passadas como segundo e terceiro argumentos do construtor `PDO` (e não dentro da DSN). É esse par usuário/senha que o SGBD usa para autenticar a conexão e determinar quais permissões (`SELECT`, `INSERT`, alterações estruturais etc.) aquela sessão terá.

### 2.6 Charset / codificação

Define a codificação de caracteres usada na comunicação entre a aplicação PHP e o banco de dados. O valor recomendado atualmente é `utf8mb4`, que suporta todo o conjunto Unicode (incluindo acentuação, caracteres especiais e até emojis) — diferente do antigo `utf8` do MySQL, que na prática é limitado. Definir o charset corretamente evita o clássico problema de acentos "quebrados" ao gravar ou exibir dados.

### 2.7 O que acontece quando `new PDO()` é executado

Ao instanciar `new PDO($dsn, $usuario, $senha)`, o PHP:

1. Interpreta a DSN e identifica qual driver deve ser carregado;
2. Tenta abrir uma conexão de rede (ou socket local) com o servidor informado;
3. Envia usuário e senha para autenticação junto ao SGBD;
4. Caso tudo ocorra corretamente, retorna um **objeto PDO** já conectado, pronto para executar comandos;
5. Caso qualquer etapa falhe, uma **PDOException** é lançada (assunto detalhado no Grupo 3).

### 2.8 Anatomia da string `mysql:host=localhost;port=3306;dbname=escola;charset=utf8mb4`

| Trecho | Significado |
|---|---|
| `mysql:` | Driver utilizado — nesse caso, o driver MySQL |
| `host=localhost` | Servidor onde o banco está rodando (máquina local) |

| `port=3306` | Porta padrão do MySQL |
| `dbname=escola` | Nome do banco de dados que será utilizado ("escola") |
| `charset=utf8mb4` | Codificação de caracteres usada na conexão |

```php
<?php
$dsn = "mysql:host=localhost;port=3306;dbname=escola;charset=utf8mb4";
$usuario = "root";
$senha = "";

$pdo = new PDO($dsn, $usuario, $senha);
```

---

## GRUPO 3 — Tratamento de erros e exceções no PDO

### 3.1 Motivos comuns para uma conexão falhar

- Usuário ou senha incorretos;
- Servidor de banco de dados fora do ar, host errado ou inacessível pela rede;
- Nome do banco de dados (`dbname`) inexistente;
- Porta incorreta ou bloqueada por firewall;
- Driver do PDO correspondente não habilitado no `php.ini` (ex.: `pdo_mysql` desativado);
- Usuário sem permissão para acessar aquele banco específico;
- Número máximo de conexões simultâneas do servidor atingido.

### 3.2 Uso de try e catch

O bloco `try/catch` permite **tentar** executar um trecho de código que pode falhar e **capturar** a exceção lançada em caso de erro, evitando que o script seja interrompido abruptamente (fatal error) e permitindo um tratamento controlado da falha — como exibir uma mensagem amigável ou registrar o erro em log.

### 3.3 O que é PDOException

`PDOException` é a classe de exceção lançada pelo PDO sempre que ocorre um erro relacionado ao banco de dados (falha de conexão, comando SQL inválido etc.), quando o modo de erro está configurado para lançar exceções. Ela estende a classe nativa `Exception` do PHP, herdando métodos como `getMessage()`, `getCode()` e `getTraceAsString()`.

### 3.4 PDO::ATTR_ERRMODE

É um **atributo de configuração** do objeto PDO que define como os erros devem ser reportados. É ajustado com `setAttribute()`:

```php
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

Os modos possíveis são:
- `PDO::ERRMODE_SILENT` — nenhum aviso é emitido automaticamente; é preciso checar manualmente `errorCode()`/`errorInfo()` após cada operação.
- `PDO::ERRMODE_WARNING` — emite um `E_WARNING`, mas o script continua executando.
- `PDO::ERRMODE_EXCEPTION` — lança uma `PDOException`, permitindo o uso de `try/catch` (modo recomendado).

### 3.5 PDO::ERRMODE_EXCEPTION

É o valor que, atribuído a `PDO::ATTR_ERRMODE`, faz com que **qualquer erro do PDO seja lançado como uma exceção**. É a prática recomendada, pois integra o tratamento de erros do banco ao mecanismo padrão de exceções do PHP, tornando o código mais previsível e mais fácil de depurar. A partir do PHP 8, esse já é o comportamento padrão, mas ainda é considerado boa prática defini-lo explicitamente.

### 3.6 Uso de getMessage() durante o desenvolvimento

O método `getMessage()`, herdado de `Exception`, retorna a **descrição textual do erro** ocorrido. Durante o desenvolvimento, exibir esse conteúdo (`echo $e->getMessage();`) ajuda a identificar rapidamente a causa do problema. Em produção, porém, recomenda-se **não exibir essa mensagem diretamente ao usuário final**, pois ela pode revelar detalhes sensíveis da estrutura do banco — o ideal é registrá-la em log e mostrar uma mensagem genérica para quem estiver usando o sistema.

### 3.7 Exemplo: conexão bem-sucedida e conexão com falha

**Conexão bem-sucedida:**

```php
<?php
$dsn = "mysql:host=localhost;port=3306;dbname=escola;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, "root", "senha_correta");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão realizada com sucesso!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
```

**Conexão com falha (senha incorreta, por exemplo):**

```php
<?php
$dsn = "mysql:host=localhost;port=3306;dbname=escola;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, "root", "senha_errada");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão realizada com sucesso!";
} catch (PDOException $e) {
    // getMessage() retornaria algo parecido com:
    // SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES)
    echo "Erro na conexão: " . $e->getMessage();
}
```

---

## GRUPO 4 — Prepared Statements: prepare() e execute()

Um *prepared statement* (comando preparado) é um comando SQL enviado ao banco de dados **em duas etapas**: primeiro sua estrutura é enviada e "compilada" pelo SGBD, com marcadores (placeholders) no lugar dos valores; depois, os valores reais são enviados separadamente para serem executados junto a essa estrutura já validada. Essa separação entre **comando** e **dado** é o que torna os prepared statements uma prática essencial ao trabalhar com PDO.

### 4.1 Função de prepare()

O método `$pdo->prepare($sql)` envia o comando SQL — contendo placeholders no lugar dos valores — para ser analisado e preparado pelo SGBD. Ele **não executa** o comando nem envia dados reais; apenas retorna um objeto `PDOStatement`, que será usado na etapa seguinte.

### 4.2 Função de execute()

O método `execute()`, chamado sobre o `PDOStatement` retornado por `prepare()`, é responsável por **enviar os valores reais** dos placeholders e efetivamente **rodar o comando** no banco de dados. Pode receber um array associativo (para placeholders nomeados) ou um array indexado (para placeholders posicionais).

### 4.3 Placeholders nomeados (`:nome`, `:nota`)

São marcadores identificados por um nome descritivo, precedido de dois-pontos, como `:nome` ou `:nota`. Os valores são associados a eles por meio de um array associativo:

```php
<?php
$sql = "SELECT * FROM alunos WHERE nome = :nome AND nota >= :nota";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nome' => 'Maria',
    ':nota' => 7
]);
```

### 4.4 Placeholders posicionais (`?`)

São marcadores genéricos, representados apenas por `?`, cuja correspondência com os valores é feita **pela ordem** em que aparecem no array passado ao `execute()`:

```php
<?php
$sql = "SELECT * FROM alunos WHERE nome = ? AND nota >= ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(['Maria', 7]);
```

Importante: não é possível **misturar** placeholders nomeados e posicionais em um mesmo comando.

### 4.5 Diferença entre preparar e executar um comando

`prepare()` define a **estrutura** do comando SQL uma única vez — o "molde" da consulta. `execute()` fornece os **dados** e efetivamente roda o comando, podendo ser chamado várias vezes sobre o mesmo `prepare()`, com valores diferentes a cada chamada. Essa separação permite, por exemplo, inserir vários registros reaproveitando a mesma preparação, com ganho de organização e desempenho.

### 4.6 Por que não é recomendado montar SQL apenas concatenando valores externos

Concatenar diretamente valores vindos do usuário (formulários, URLs etc.) dentro da string SQL mistura **código** e **dado** no mesmo texto. Isso é problemático porque:
- Um valor malicioso pode "escapar" do contexto de dado e ser interpretado como parte do comando SQL (SQL Injection);
- Exige tratamento manual de aspas e caracteres especiais, propenso a falhas;
- O SGBD não consegue reaproveitar o plano de execução da consulta, já que o SQL muda a cada valor diferente;
- Torna o código mais difícil de ler e manter.

### 4.7 Relação entre prepared statements e prevenção de SQL Injection

Nos prepared statements, os valores são enviados ao banco **separadamente** da estrutura do comando SQL, e não como parte do texto da query. Com isso, o SGBD sempre trata qualquer valor recebido estritamente como **dado**, nunca como comando — mesmo que esse valor contenha aspas, ponto e vírgula ou palavras-chave SQL. É justamente essa separação que neutraliza a técnica clássica de SQL Injection, tornando os prepared statements uma das defesas mais eficazes e recomendadas contra esse tipo de ataque.

---

## GRUPO 5 — Inserindo, alterando e excluindo dados com PDO

### 5.1 INSERT com prepared statement

```php
<?php
$sql = "INSERT INTO alunos (nome, nota) VALUES (:nome, :nota)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nome' => 'João Pedro',
    ':nota' => 8.5
]);
```

### 5.2 UPDATE com prepared statement

```php
<?php
$sql = "UPDATE alunos SET nota = :nota WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nota' => 9.0,
    ':id' => 3
]);
```

### 5.3 DELETE com prepared statement

```php
<?php
$sql = "DELETE FROM alunos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => 12]);
```

### 5.4 Fluxo PHP → prepare() → execute() → banco

1. O PHP monta a string SQL, já com os placeholders no lugar dos valores;
2. `prepare()` envia essa estrutura ao SGBD, que a analisa e devolve um objeto `PDOStatement` (o "molde" pronto para receber dados);
3. `execute()` envia os valores reais, associados aos placeholders;
4. O SGBD combina estrutura + dados, executa o comando e devolve o resultado (linhas afetadas, dados retornados, erro etc.) de volta ao PHP.

### 5.5 Uso de parâmetros nos comandos

Os parâmetros podem ser passados diretamente como array no `execute()` — como nos exemplos acima — ou vinculados manualmente antes da execução, com `bindValue()` ou `bindParam()`, o que permite inclusive especificar o tipo do dado (`PDO::PARAM_INT`, `PDO::PARAM_STR` etc.) para maior controle.

### 5.6 Para que serve rowCount()

`rowCount()` retorna o **número de linhas afetadas** pela última operação `INSERT`, `UPDATE` ou `DELETE` executada por aquele `PDOStatement`. É muito usado para verificar se uma operação realmente alterou algum registro — por exemplo, para confirmar se um `UPDATE` ou `DELETE` de fato encontrou e modificou alguma linha. (Para comandos `SELECT`, o comportamento de `rowCount()` pode variar entre drivers, sendo mais confiável usar `fetchAll()` ou `COUNT()` no próprio SQL para contar registros.)

### 5.7 Para que serve lastInsertId()

`lastInsertId()` retorna o valor do **último ID gerado automaticamente** (auto incremento) pela conexão atual, na última operação `INSERT` executada. É extremamente útil quando é necessário saber, logo após inserir um registro, qual foi o identificador atribuído a ele — por exemplo, para em seguida inserir dados relacionados em outra tabela.

### 5.8 Exemplo prático de alteração de dados

```php
<?php
$dsn = "mysql:host=localhost;port=3306;dbname=escola;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1) Insere um novo aluno
    $sqlInsert = "INSERT INTO alunos (nome, nota) VALUES (:nome, :nota)";
    $stmt = $pdo->prepare($sqlInsert);
    $stmt->execute([
        ':nome' => 'Carlos Eduardo',
        ':nota'  => 8.7
    ]);

    $novoId = $pdo->lastInsertId();
    echo "Aluno inserido com sucesso! ID gerado: {$novoId}" . PHP_EOL;

    // 2) Atualiza a nota do aluno recém-criado
    $sqlUpdate = "UPDATE alunos SET nota = :nota WHERE id = :id";
    $stmt = $pdo->prepare($sqlUpdate);
    $stmt->execute([
        ':nota' => 9.2,
        ':id'   => $novoId
    ]);

    echo "Linhas afetadas pelo UPDATE: " . $stmt->rowCount() . PHP_EOL;

} catch (PDOException $e) {
    echo "Ocorreu um erro: " . $e->getMessage();
}
```

Esse exemplo une, em um único fluxo, a inserção de um registro, a captura do seu ID com `lastInsertId()`, e a posterior atualização desse mesmo registro, confirmando a alteração com `rowCount()`.

---

## Síntese

Os cinco grupos, em conjunto, cobrem o ciclo completo de uso do PDO em uma aplicação PHP: entender o que é e por que utilizá-lo (Grupo 1), estabelecer a conexão corretamente (Grupo 2), tratar os erros que podem surgir nesse processo (Grupo 3), preparar comandos SQL de forma segura (Grupo 4) e, finalmente, aplicar tudo isso para inserir, alterar e excluir dados reais no banco (Grupo 5). Dominar esses cinco pontos é a base para desenvolver aplicações PHP que se comuniquem com bancos de dados de forma segura, organizada e portátil.

Para aprofundamento adicional, a documentação oficial do PHP sobre PDO é a referência mais confiável: `https://www.php.net/manual/en/book.pdo.php`.
