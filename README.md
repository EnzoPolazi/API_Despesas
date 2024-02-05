# API_Despesas:

API Rest desenvolvida em Laravel para implementação de um CRUD de despesas com autenticação de usuários e controle de acesso.

## Pré-requisitos:

* [PHP 8 ou superior](https://www.php.net/) - Linguagem base do projeto
* [Composer](https://getcomposer.org/) - Gerenciador de dependências
* Banco de dados de sua preferência

### Instalando:

Após certificar-se de possuir todos os pré-requisitos, faça o download dos arquivos ou vá até o diretório desejado e utilize o comando:

```
git clone https://github.com/EnzoPolazi/API_Despesas
```

Após essa etapa, vá até a raiz do projeto e utilize e composer para instalar as dependências do projeto com o seguinte comando:

```
cd api_despesas
composer update
```

Com as dependências instaladas, a próxima etapa é configurar as variáveis de ambiente no seu arquivo .env com as informações do seu banco de dados e do serviço de envio de emails de sua preferência.

Com essas configurações realizadas, basta inicializar as migrations com o comando:
```
php artisan migrate
```

Agora sim, tudo pronto! Basta utilizar o seguinte comando para utilizar a aplicação:
```
php artisan serve
```

## Tecnologias utilizadas:

* [Laravel](https://laravel.com/) - Framework base do projeto
* [MySql](https://www.mysql.com/) - Banco de dados
* [MailTrap](https://mailtrap.io/) - Ferramenta para simular envio de emails
* [Postman](https://www.postman.com/) - Envio de requisições para testes da API
