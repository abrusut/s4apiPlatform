#-----------------------Crear proyecto Symfony 4 - EasyAdmin - Api Platform -----------------------#

Se asume que esta instalado:
    php version > 7.3,
    composer

NOTA: Las URL que veran a continuacion se tratan symfony en docker con php 7.3 expuesto en puerto :83

1) composer create-project symfony/skeleton project -vvv
2) composer require annotations
3) composer require symfony/orm-pack
4) composer require symfony/maker-bundle --dev

    Prueba: http://localhost:83/s4apiPlatform/project/
            http://localhost:83/s4apiPlatform/project/public/index.php/blog/1

5) Generando entitys:

    php bin/console make:entity

6) Una vez generada la entidad generamos el archivo de migraciones

    6.1 Generar archivos de migracion
        php bin/console make:migration

    6.2 Ejecuar migraciones
        php bin/console doctrine:migrations:migrate

7) Serializar/Deserializar entidades y
    composer require serializer

8) Doctrine fictures bundle
    composer require --dev doctrine/doctrine-fixtures-bundle

    8.1 Generar fixtures en src/DataFixtures/AppFixtures.php
    8.2 Ejecutar Fixtures
        php bin/console doctrine:fixtures:load


#--------------------------------Install Easy Admin----------------------------------------------#

1) composer require admin
2) Enable entitys for administration in:
    /config/packages/easy_admin.yaml
    Example:
    easy_admin:
        entities:
    #        # List the entity class name you want to manage
            - App\Entity\BlogPost
3) Test plugin:
    http://localhost:83/s4apiPlatform/project/public/index.php/admin/?action=list&entity=BlogPost

#-------------------------------------------------------------------------------------------------#


#--------------------------------Install Api Platform ----------------------------------------------#
1) composer require api -vvv
2) Modificar Entitys colocando @ApiResources de Api Platform a las Entity
    use ApiPlatform\Core\Annotation\ApiResource;
    /**
     * @ORM\Entity(repositoryClass="App\Repository\BlogPostRepository")
     * @ApiResource()
     */
    class BlogPost



#---------------------------------------------------------------------------------------------------#