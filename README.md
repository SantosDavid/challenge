# Desafio

## Instruçoẽs

1 - Depois de clonar o projeto rode <strong>composer install</strong>

2 - Configure a conexão com o banco e seguida rode <strong>php artisan migrate</strong>

3 - Adicione um csv com clientes pelo painel.

4 - rode <strong>php artisan CsvProccess</strong>

### Criação de Clientes

### Requisitos negócio:

- Criar estrutura banco de dados:
    > Cliente (nome, email, data_nascimento, cpf);
    > Endereco (logradouro, numero, complemento, bairro, cep, cidade, latitude, longitude);
- Importar um arquivo CSV de cliente(s);
- Parsear endereço (logradouro, número, complemento, bairro, cep, cidade);
- Buscar GeoLocalização (GeoCoding) utilizando API do Google;
- Salvar em Banco de dados;
- Exibir em um grid os dados importados no BD;
- Exportar dados do Grid em csv;

### Requisitos Técnicos:

- controle de versionamento (GIT)
- PHP 7;
- Utilizar Composer para libs externas;
- Framework;
- Mysql;
- Front Bootstrap;

### Extras:

- Exportar dados em formato CSV;
- Upload de CSV via AJAX;

O que se espera: 

- Utilização de Design Patterns (https://www.php-fig.org/psr/)
- Desenvolvimento da Lógica para leitura do CSV;
- Validação e cleanup dos dados(Parse endereço);
- Buscar geocoding;
- Estruturação da tabela;
- Salvar dados BD;

Diferenciais;

- Dependency Injector (ex: Pimple)
- Docker
- Template Engine (ex: Twig)
- Importar CSV a partir de linha de comando (https://laravel.com/docs/5.6/artisan#writing-commands)