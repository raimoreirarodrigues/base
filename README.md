# Descrição

   > ### 1.0 Quais tecnologias foram utilizadas na construção?
   - `Framework`: Laravel V. 10.13.0
   - `Langague`: PHP V. 8.2
   - `Database`: MySQL V. 5.7
   - `Docker`: Image php:8.2
    
# Instalação

>    Etapa 01 - Clone repositório e entre no diretório do projeto
    
     cd base
    
>    Etapa 02 - Rode o comando abaixo para criar uma imagem p/o container:
    
     sudo docker-compose build --no-cache
    
>    Etapa 03 - Rode o comando abaixo para instalar as dependências do projeto:
    
     sudo docker-compose run estudo php -d memory_limit=-1 /usr/local/bin/composer install

>    Etapa 04 - Rode o comando abaixo para subir o container criado:

     sudo docker-compose up -d

>    Etapa 05 - Rode o comando abaixo para criar o .env. Após isso, edite o .env as configurações de acesso ao  banco de dados conforme seu ambiente:

     cp .env.example .env
    
>    Etapa 06 - Rode o comando abaixo para entrar no container criado:
    
     sudo docker exec -it estudo bash

>    Etapa 07 - Rode o comando abaixo para gerar uma key 
    
     php artisan key:generate

>    Etapa 08 - Rode o comando abaixo para gerar as chaves de acesso da API via Passport 
    
     php artisan passport:install
