# SOSCantinas API

Repositório da API do projeto SOSCantinas.

Para visualizar em seu computador use:

```
git clone https://github.com/viniciuslimaan/soscantinasApi.git

cd soscantinas

composer i

php artisan make:migrate
--> ou caso queira dados fake execute:
php artisan make:migrate --seed

php artisan jwt:secret

php artisan serve
```

Obs: é necessário a configuração do .env e a criação de uma tabela chamada 'soscantinas' antes de executar os comandos php.

## Tecnologias utilizadas

-   PHP
    -   Laravel

## Variáveis de ambiente

Para utilizar essa aplicação, basta apagar o '.example' do arquivo '.env.example' podendo tanto deixar como está, quanto editando de acordo com sua necessidade.

## Postman

As rotas e o ambiente estão configurados e prontos. Para acessá-los, basta importar no Postman. Os arquivos para importação estão localizados em 'libs'.
