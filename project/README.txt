Crear proyecto Symfony 4 - Api Platform

Se asume que esta instalado:
    php version > 7.x,
    composer
Pasos:
1) composer create-project symfony/skeleton project -vvv
2) composer require annotations
3) composer require symfony/orm-pack
4) composer require symfony/maker-bundle --dev

5) Generando entitys:

php bin/console make:entity

6) Una vez generada la entidad generamos el archivo de migraciones

Generar archivos de migracion
    php bin/console make:migration

Ejecuar migraciones
    php bin/console doctrine:migrations:migrate