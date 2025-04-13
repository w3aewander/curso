# Sistema de Cursos

Sistema integrado para gestão de cursos desenvolvido com PHP e Vue.js.

## 🚀 Tecnologias Utilizadas

- PHP 8.1+
- Vue.js 3
- MySQL 8.0+
- Composer
- Node.js 16+
- NPM

## 📁 Estrutura de Diretórios

```
curso/
├── application/            # Código da aplicação
│   ├── Controller/        # Controladores PHP
│   ├── Model/            # Models PHP
│   ├── helpers/          # Funções auxiliares
│   ├── resources/        # Views e assets
│   │   ├── views/       # Templates Blade
│   │   └── layouts/     # Layouts Blade
│   ├── src/             # Código-fonte Vue.js
│   │   ├── assets/      # Assets do Vue
│   │   ├── components/  # Componentes Vue
│   │   └── views/       # Views Vue
│   └── storage/         # Armazenamento temporário
├── public/              # Arquivos públicos
│   ├── css/            # CSS compilado
│   └── js/             # JavaScript compilado
├── vendor/             # Dependências PHP
└── node_modules/       # Dependências JavaScript
```

## 🛠️ Instalação

### Pré-requisitos

1. PHP 8.1 ou superior
2. MySQL 8.0 ou superior
3. Composer
4. Node.js e NPM

### Configuração do Banco de Dados

```bash
# Importe o arquivo SQL
mysql -u seu_usuario -p sua_base < curso.sql
```

### Instalação das Dependências

```bash
# Instala dependências PHP
composer install

# Instala dependências JavaScript
npm install
```

## 💻 Desenvolvimento

1. Configure seu ambiente:

```bash
# Copie o arquivo de ambiente
cp .env.example .env

# Edite as configurações
nano .env
```

2. Inicie o servidor de desenvolvimento:

```bash
# Terminal 1: Servidor PHP
php -S localhost:8000 -t public

# Terminal 2: Hot-reload Vue
npm run serve
```

3. Acesse: `http://localhost:8000`

## 🚀 Produção

1. Build dos assets:

```bash
# Compila e minifica
npm run build
```

2. Configure o Apache:

```apache
<VirtualHost *:80>
    DocumentRoot /var/www/html/curso/public
    <Directory /var/www/html/curso/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

3. Ajuste as permissões:

```bash
sudo chown -R www-data:www-data storage/
sudo chmod -R 775 storage/
```

## 📚 Documentação Adicional

- [Vue.js](https://vuejs.org/)
- [PHP](https://php.net/)
- [MySQL](https://mysql.com/)

## 🔐 Segurança

- Mantenha o `vendor/` e `node_modules/` fora do repositório
- Configure corretamente as variáveis de ambiente
- Mantenha as dependências atualizadas

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
