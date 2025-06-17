
# Catálogo de Animes

---

## 📚 Visão Geral do Projeto

O **Catálogo de Animes** é uma aplicação web desenvolvida em PHP que permite aos usuários explorar, visualizar e gerenciar um catálogo de animes e filmes. Ele oferece funcionalidades para listar obras, visualizar detalhes, e, para usuários autenticados, registrar novos títulos e gerenciar avaliações. O sistema inclui um robusto módulo de autenticação e gerenciamento de banco de dados.

---

## ✨ Funcionalidades Principais

* **Listagem de Obras:** Exibe todos os animes e filmes disponíveis no catálogo.
* **Detalhes da Obra:** Cada obra possui uma página individual com informações detalhadas, incluindo título, tipo de mídia, gênero, duração, descrição e imagem.
* **Sistema de Autenticação:**
    * **Cadastro de Usuários:** Permite que novos usuários se registrem no sistema.
    * **Login e Logout:** Gerenciamento seguro de sessões de usuário.
    * **Admin:** Suporte para usuários administradores com permissões elevadas.
* **Gerenciamento de Conteúdo (para Admins):**
    * Adicionar novas obras ao catálogo.
    * Editar informações de obras existentes.
    * Excluir obras.
* **Avaliações:** Usuários podem comentar e avaliar as obras (funcionalidade pode ser expandida).
* **Criação e População do Banco de Dados:** Script PHP para configurar o banco de dados e inserir dados iniciais.

---

## 🛠️ Tecnologias Utilizadas

* **Backend:** PHP
* **Banco de Dados:** MySQL
* **Interface:** HTML, CSS, JavaScript (se aplicável ao frontend que interage com este backend)

---

## 🚀 Como Configurar e Rodar o Projeto

Para configurar e rodar este projeto em sua máquina local, siga os passos abaixo:

### 1. Pré-requisitos

Certifique-se de ter instalado:

* **Servidor Web:** Apache ou Nginx.
* **PHP:** Versão 8.0 ou superior (devido ao uso do operador `match` e `password_hash`).
* **MySQL:** Servidor de banco de dados (ex: XAMPP, WAMP, MAMP, ou instalação independente).

### 2. Clonar o Repositório

```bash
git clone https://github.com/BryanWalace/catalogo-animes.git
cd catalogo-animes
```

### 3. Configuração do Servidor Web

Mova a pasta do projeto para o diretório de documentos do seu servidor web (ex: `htdocs` para Apache, `www` para Nginx).

Certifique-se de que o diretório `BASE_URL` definido no seu arquivo `Banco.php` (ou arquivo de configuração de rota) corresponda ao caminho no seu servidor. Por exemplo:

```
http://localhost/catalogo-animes
```

Sua `BASE_URL` deve ser:

```
/catalogo-animes
```

### 4. Configuração do Banco de Dados

O projeto inclui um script para criar e popular o banco de dados automaticamente.

#### Ajustar Conexão (se necessário):

No arquivo `Banco.php`, verifique e ajuste as credenciais de conexão:

```php
class Banco {
    public static function getConn() {
        // Verifique e ajuste conforme sua configuração
        return new PDO("mysql:host=localhost;port=3307;dbname=catalogo_animes", "root", "");
    }
}
```

#### Criar o Banco de Dados

Acesse a URL que executa a função `criaBanco()`. Geralmente, este é um arquivo como `setup.php` ou `init_db.php`.

Se o banco de dados não for criado automaticamente ao acessar a URL base, digite `setup.php` no final do endereço do seu localhost:

```
http://localhost/catalogo-animes/setup.php
```

Este script irá:

* Remover o banco de dados `catalogo_animes` se ele já existir.
* Criar um novo banco de dados `catalogo_animes`.
* Criar as tabelas `usuarios`, `obras` e `avaliacoes` com as respectivas colunas e chaves.
* Popular as tabelas com dados de exemplo, incluindo usuários (com senhas hash seguras) e obras.

**Credenciais do Admin padrão:**

* Email: admin@email.com
* Senha: admin123

### 5. Acessar a Aplicação

Após configurar o servidor e o banco de dados, abra seu navegador e acesse a URL base do projeto:

```
http://localhost/catalogo-animes/
```

---

## 📂 Estrutura do Projeto

```
.
├── assets/
│   └── css/
│       └── style.css                    # Estilo principal da aplicação
├── config/
│   └── banco.php                        # Conexão com o banco de dados
├── controllers/
│   ├── AnimeController.php
│   ├── AuthController.php
│   ├── AvaliacaoController.php
│   ├── CategoriaController.php
│   └── HomeController.php              # Lógica dos controladores
├── docs/                                # Documentação do projeto
├── models/
│   ├── avaliacao.php
│   ├── obra.php
│   └── usuario.php                      # Modelos da aplicação
├── views/
│   ├── animes/
│   │   ├── editar.php
│   │   ├── novo.php
│   │   └── ver.php
│   └── partials/
│       ├── footer.php
│       ├── header.php
│       ├── admin.php
│       ├── animes.php
│       ├── cadastro.php
│       ├── categoria_animes.php
│       ├── categorias.php
│       ├── home.php
│       ├── login.php
│       └── recuperar_senha.php        # Fragmentos e páginas completas
├── .htaccess                            # Configuração de URL amigável para Apache
├── debug.log                            # Log de depuração
├── index.php                            # Ponto de entrada principal
├── README.md                            # Documentação geral do projeto
├── setup.php                            # Script de criação/população do banco
└── sqlDoBanco.txt                       # Script SQL alternativo ou auxiliar
```

---

## 🔒 Segurança

Este projeto incorpora boas práticas de segurança, como:

* **Senhas Hashed:** Utiliza `password_hash()` para armazenar senhas de forma segura.
* **Prevenção de XSS:** Uso de `htmlspecialchars()` para sanitizar dados de entrada.
* **Prevenção de SQL Injection:** Utilização de PDO com `prepared statements` (se implementado).

---

## 🤝 Contribuição

Contribuições são bem-vindas! Se você deseja contribuir com este projeto:

1. Faça um fork do repositório.
2. Crie uma nova branch para sua feature (`git checkout -b feature/minha-feature`).
3. Faça suas alterações e adicione commits claros.
4. Envie suas alterações (`git push origin feature/minha-feature`).
5. Abra um Pull Request descrevendo suas mudanças.

---

## 📜 Licença

Este projeto está sob a licença [MIT License]. Consulte o arquivo LICENSE para mais detalhes.

---

## 📞 Contato

Para dúvidas ou sugestões, entre em contato:

