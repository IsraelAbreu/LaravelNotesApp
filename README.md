<img src="/public/assets/images/presentation_github.png" width="400" alt="Imagem de apresentação">

# LaravelNotesApp

O Notes App é aplicação web simples de **anotações** desenvolvido com Laravel como parte do curso Laravel 11 & 12: Framework, Ecossistema e Projetos Web.

Repositório: [IsraelAbreu/LaravelNotesApp](https://github.com/IsraelAbreu/LaravelNotesApp)

---

## 🧮 Visão Geral

O Notes App permite que usuários criem, leiam, editem e excluam suas anotações — o clássico “CRUD” (Create, Read, Update, Delete) — utilizando o framework Laravel. Esse projeto foi ideal para eu praticar e aprender o **Core** do Laravel, como rotas, controladores, Models, Migrations, views, Middlewares e Seeds no contexto de um app web funcional.

---

## 🚀 Funcionalidades

- Autenticação de usuários (login)
- Criação de novas anotações
- Listagem de anotações existentes  
- Edição de anotações  
- Exclusão de anotações  
- Relacionamento de usuário logado e suas anotações. 
- Interface simples e funcional para o usuário

---

## 🛠️ Tecnologias Utilizadas

- PHP 8.3
- Laravel 12 
- Banco de dados (MySQL utilizado no projeto)  
- Migrations para estrutura das tabelas  
- Blade template engine.
- Front-end básico (HTML, CSS, Bootstrap)  
- Gerenciamento de dependências via Composer

---

## 📥 Instalação / Setup

1. Clone o repositório:  
   ```bash
   git clone https://github.com/IsraelAbreu/LaravelNotesApp.git
   cd LaravelNotesApp
2. Copie .env.example para .env e com base no meu banco de dados:
   ``` 
   cp .env.example .env
3. Gere a chave da aplicação Laravel:
   ``` 
    php artisan key:generate
4. Configure seu banco de dados no .env (host, database, usuário, senha) e então rode as migrations:
   ``` 
   php artisan migrate
5. Rode o servidor de desenvolvimento:
   ``` 
   php artisan serve
6. Se nenhum erro for apresentado, ccesse no navegador: http://localhost:8000 e comece a usar o app

# 📝 Contribuições

Fique à vontade para contribuir! Se quiser sugerir melhorias ou correções:

Fork o repositório

Crie uma nova branch (git checkout -b minha-feature)

Realize suas mudanças e commit

Abra um Pull Request com descrição clara do que foi modificado

# 📄 Licença

Este projeto está licenciado sob a MIT License
 — sinta-se livre para usar, modificar e distribuir.

📬 Contato

Se tiver dúvidas, sugestões ou quiser conversar sobre o projeto, pode me chamar no GitHub: @IsraelAbreu

# 🧑‍💻 Desenvolvido por Israel – Estudando Desenvolvimento Web
