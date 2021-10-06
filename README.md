#  Laravel RESTful API - JWT

## Install`

- Copiar ``.env.example`` a ``.env``
- Instalar las dependencias del proyecto:

`composer install`

- Generar el key y la base de datos:

``php artisan key:generate``
``php artisan migrate --seed``

- Renombrar el archivo **.env.example** a **.env**, abrirl y colocar el nombre de la base de datos, tu usuario y password.

## Generate secret key
Generar el key de jwt:

``php artisan jwt:secret``

Lo cual actualizará el ``.env``

## Usage:
Para levantarlo en la red local
``php artisan serve`` or
``php artisan serve --host=0.0.0.0``

## Reset migrations:

```sh
php artisan migrate:fresh
```
## SNAPPY

Descargar e instalar https://wkhtmltopdf.org/downloads.html y modificar las variables SNAPPY_PDF_LOCATION y SNAPPY_IMG_LOCATION del archivo `.env` con la ruta de wkhtmltopdf a utilizar en windows.

## SHINOBI (ROLES, PERMISOS, USUARIOS):

- Instalación:

```sh
composer require caffeinated/shinobi

php artisan vendor:publish --provider="Caffeinated\Shinobi\ShinobiServiceProvider" --tag="config"

composer require laravelcollective/html

EJECUTAR UNA SOLA VES AL INICIO DEL PROYECTO
composer require laravel/ui:^2.4

php artisan ui vue --auth
```

## SEED PERSONAL TED LA PAZ

php artisan db:seed --class=PersonalTedSeeder

## Referencias
https://github.com/barryvdh/laravel-snappy


## RENOVAR EL STORAGE

```sh
php artisan storage:link
```
