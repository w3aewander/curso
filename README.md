# Sistema de Gerenciamento de Cursos 🎓

## 👤 Autor
- **Nome**: Wanderlei Silva do Carmo
- **E-mail**: wander.silva@gmail.com

## 📚 Sobre o Projeto

O Sistema de Gerenciamento de Cursos é uma aplicação web desenvolvida com propósitos educacionais, demonstrando a implementação de um CRUD básico utilizando:

- [PHP 8.x](https://www.php.net/)
- [Slim Framework 4](https://www.slimframework.com/) (Roteamento)
- [Bootstrap 5](https://getbootstrap.com/)
- [Font Awesome 6](https://fontawesome.com/)
- [PostgreSQL](https://www.postgresql.org/) ou [MySQL](https://www.mysql.com/)

## 📦 Pacotes Principais

```json
{
    "require": {
        "slim/slim": "^4.0",
        "slim/psr7": "^1.6",
        "php-di/php-di": "^7.0",
        "ext-pdo": "*"
    }
}
```

## 🎯 Funcionalidades

- Listagem de cursos
- Cadastro de novos cursos
- Edição de cursos existentes
- Exclusão de cursos
- Visualização de detalhes do curso

## 💻 Estrutura do Projeto

```
curso/
├── src/
│   ├── Controller/
│   │   └── CursosController.php
│   ├── Model/
│   │   └── Curso.php
│   ├── View/
│   │   └── CursosView.php
│   └── templates/
│       ├── header.phtml
│       ├── footer.phtml
│       └── cursoForm.phtml
└── public/
    └── index.php
```

## 🚀 Instalação

1. Clone o repositório
```bash
git clone https://seu-repositorio/curso.git
cd curso
```

2. Instale as dependências
```bash
composer install
```

3. Configure o banco de dados
```sql
-- PostgreSQL
CREATE DATABASE curso_db;

-- ou MySQL
CREATE DATABASE curso_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

4. Configure o arquivo de ambiente
```bash
cp .env.example .env
# Edite o arquivo .env com suas configurações
```

## 🔧 Requisitos

- PHP 8.x
- PostgreSQL 14+ ou MySQL 8+
- Apache2 com mod_rewrite habilitado
- Composer (Gerenciador de dependências PHP)

### Configurações do Apache

```apache
<VirtualHost *:80>
    ServerName localhost
    DocumentRoot /var/www/html/curso/public
    
    <Directory /var/www/html/curso/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### Habilitando mod_rewrite
```bash
sudo a2enmod rewrite
sudo service apache2 restart
```

## 📚 Links de Referência

- [Slim Framework Documentation](https://www.slimframework.com/docs/v4/)
- [Bootstrap Documentation](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
- [Font Awesome Documentation](https://fontawesome.com/docs)
- [PHP PDO Documentation](https://www.php.net/manual/pt_BR/book.pdo.php)

## 📌 Observações

Este projeto foi desenvolvido com fins didáticos e serve como exemplo prático para:

- Implementação do padrão MVC
- Boas práticas de programação
- Organização de código
- Uso de frameworks CSS
- Interação com banco de dados

## 👨‍🏫 Uso Educacional

Este projeto pode ser utilizado como material de apoio para:

- Aulas de programação web
- Estudos de PHP orientado a objetos
- Demonstração de padrões de projeto
- Práticas de desenvolvimento web

## 🤝 Contribuição

Por ser um projeto didático, sugestões e melhorias são bem-vindas através de issues ou pull requests.

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.

---
Desenvolvido com ❤️ para fins educacionais.
© 2024 Wanderlei Silva do Carmo. Todos os direitos reservados.