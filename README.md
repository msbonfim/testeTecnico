*****Sistema de Gestão de Usuários em PHP******
Um projeto web simples para demonstrar um CRUD (Create, Read, Update, Delete) completo de usuários, construído com PHP puro e seguindo o padrão de arquitetura MVC (Model-View-Controller).

**Funcionalidades**
Gestão de Usuários:
- Listar todos os usuários com informações de perfil.
- Criar um novo usuário, associando a um perfil.
- Visualizar os detalhes de um usuário específico.
- Editar as informações de um usuário existente.
- Excluir um usuário.
  
Gestão de Perfis: 
- Estrutura de banco de dados para separação de usuários por perfis (ex: Administrador, Usuário Comum).
  
Arquitetura MVC: 
- O código é organizado em Modelos, Visões e Controladores para facilitar a manutenção e escalabilidade.
  
Roteamento Centralizado: 
- Todas as requisições são tratadas por um único ponto de entrada (index.php) com o auxílio do .htaccess para URLs amigáveis.
  
Interface Responsiva: 
- A interface foi desenvolvida utilizando o framework front-end Bootstrap 5, adaptando-se a diferentes tamanhos de tela.

Tecnologias Utilizadas:
- Back-end: PHP 8+
- Banco de Dados: MySQL
- Front-end: HTML5, CSS3, Bootstrap 5
- Servidor Web: Apache (com mod_rewrite ativado)


Estrutura do Projeto
A estrutura de diretórios segue o padrão MVC para garantir a separação de responsabilidades.


```
/TESTETECNICO/
├── config/
│   └── db.php                # Configuração da conexão com o banco de dados.
├── controllers/
│   └── UsuarioController.php # Controla a lógica de negócio para usuários.
├── models/
│   ├── Perfil.php            # Modelo para interagir com a tabela de perfis.
│   └── Usuario.php           # Modelo para interagir com a tabela de usuários.
├── views/
│   ├── partials/             # Partes reutilizáveis do template (header, footer).
│   ├── usuarios/             # Views específicas do CRUD de usuários (index, create, edit, view).
│   ├── error.php             # Página de erro padrão.
│   └── home.php              # Página inicial da aplicação.
├── assets/
│   └── css/
│       └── style.css         # Estilos CSS personalizados (ex: animação do botão).
├── .htaccess                 # Configuração do Apache para URLs amigáveis.
└── index.php                 # Ponto de Entrada Único (Front Controller / Roteador).
```



Instalação e Execução:
Siga os passos abaixo para executar o projeto localmente.

1. Pré-requisitos
Um ambiente de desenvolvimento local como XAMPP ou WAMP, que inclua Apache, MySQL e PHP.
2. Configuração do Projeto
Clone este repositório ou coloque a pasta do projeto (testeTecnico) dentro do diretório htdocs do XAMPP. O caminho deve ser similar a C:\xampp\htdocs\projects\testeTecnico.
Verifique o .htaccess: Abra o arquivo .htaccess e confirme se a linha RewriteBase corresponde ao caminho do seu projeto (ex: RewriteBase /projects/testeTecnico/).
Verifique a Conexão com o Banco: Abra config/db.php e certifique-se de que as credenciais ($username, $password, $db_name) correspondem à sua configuração local do MySQL.
3. Configuração do Banco de Dados
Abra o phpMyAdmin (geralmente acessível por http://localhost/phpmyadmin).
Crie um novo banco de dados chamado teste_tecnico.
SQL

CREATE DATABASE teste_tecnico;
Selecione o banco teste_tecnico e vá para a aba SQL. Execute os comandos abaixo para criar as tabelas e inserir dados iniciais.
Fazer a importação do arquivo sql anexo.


4. Acessar a Aplicação
Abra seu navegador e acesse a URL correspondente à sua pasta de projeto. Exemplo: http://localhost/projects/testeTecnico/

